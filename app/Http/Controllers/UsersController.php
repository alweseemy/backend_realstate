<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


use App\Models\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\DataTables\UsersDataTable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use File;
use Intervention\Image\ImageManager;
use App\Http\Controllers\UploadFiles as Upload;
use Session;


class UsersController extends Controller
{
    //use Authorizable;
    /**
     * @param usersDataTable $dataTable
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.users.index',['title' => trans('orbscope.show-all').' '.trans('orbscope.users')]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin.users.create',['title'=> trans('orbscope.add').' '.trans('orbscope.users'), 'roles' => $roles]);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'         => 'required',
            'password'     => 'required',
            'email'        => 'required|unique:users',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'name'       =>trans('orbscope.name'),
            'email'      =>trans('orbscope.email'),
            'password'   =>trans('orbscope.password'),
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $users                 = new User();
            $users->name           = $request->input('name');
            $users->email          = $request->input('email');
            $users->phone          = $request->input('phone');
            $users->password       = bcrypt($request->input('password'));
            $users->type           = 'agent';
            $users->save();

            $roles = $request['roles']; //Retrieving the roles field
            //Checking if a role was selected
            if (isset($roles)) {
                foreach ($roles as $role) {
                    $role_r = Role::where('id', '=', $role)->firstOrFail();
                    $users->assignRole($role_r); //Assigning role to user
                }
            }

            session()->flash('success',trans('orbscope.success'));
            return redirect(AdminPath().'/users');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

       $show=User::find($id);

       return view('admin.users.show',compact('show'),['title'=>trans('orbscope.show').' '.trans('orbscope.user').' '.$show->name]);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $agent = User::find($id);
        $roles = Role::get(); //Get all roles
        if ($agent) {
            return view('admin.users.edit',[
                'title'=> trans('orbscope.edit').' '.trans('orbscope.agents'),
                'edit' => $agent,
                'roles'=>$roles,

            ]);
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $users = User::find($id);
        if ($users) {
            $rules = [
                'name' => 'required',
                'email' => 'required|unique:users,email,' . $id . ',id',

            ];
            $validator = Validator::make($request->all(), $rules);
            $validator->SetAttributeNames([
                'name' => trans('orbscope.name'),
                'email' => trans('orbscope.email'),
            ]);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            } else {
                $user = User::find($id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone          = $request->input('phone');
                if (!empty($request->password) && $request->password != null) {
                    $user->password = bcrypt($request->password);
                }
                $user->save();
                $roles = $request['roles']; //Retreive all roles
                if (isset($roles)) {
                    $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
                }
                else {
                    $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
                }
                session()->flash('success', trans('orbscope.success'));
                return redirect()->back();

            }
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if($id==90){
            session()->flash('error', trans('orbscope.error'));
            return redirect()->back();
        }
        $users = User::find($id);
        $users->delete();
        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect(AdminPath() . '/users');
    }


    public function multi_delete(Request $request) {
        $data = $request->input('selected_data');
        if(is_array($data)){
            User::destroy($data);
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/users');
        }
        else {
            $users = User::find($data);
            if($users->id==90){
                session()->flash('error', trans('orbscope.error'));
                return redirect()->back();
            }
            $users->delete();

            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/users');
        }
    }




    public function download_cv($id){

        $file_path = public_path('uploads').'/cv_editor/'.$id;
        return response()->download($file_path);
    }




}
