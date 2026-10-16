<?php

namespace App\Http\Controllers;

use App\Http\DataTables\ServicesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Event;


use App\DataTables\EventsDataTable;
use App\Models\Service;
use Validator;
use Illuminate\Http\Request;
use Logs;
use Illuminate\Http\File;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\UploadFiles as Upload;
use Session;
use Form;


class ServicesController extends Controller
{
    /**
     * @param departmentDataTable $dataTable
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */

    //use Authorizable;
    public function index(ServicesDataTable $dataTable)
    {
        return $dataTable->render('admin.services.index',['title' => trans('orbscope.show-all').' '.trans('orbscope.services')]);
    }


    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function create()
    {

        return view('admin.services.create',['title'=> trans('orbscope.add').' '.trans('orbscope.service')]);
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
            'title'    => 'required',


        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'title'  =>trans('orbscope.title'),


        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {


            $department = new Service();
            $department->title              = $request->input('title');

            $department->save();
            session()->flash('success',trans('orbscope.success'));
            return redirect()->back();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Service::find($id);
        return view('admin.services.edit',['edit'=>$department,'title'=>trans('orbscope.edit').' '.trans('orbscope.service').' : '.    $department->title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title'    => 'required',



        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'title'  =>trans('orbscope.title'),



        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $department = Service::find($id);

            $department->title              = $request->input('title');

            $department->save();


            session()->flash('success',trans('orbscope.success'));
            return redirect()->back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Service::find($id);


        $department->delete();
        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect(AdminPath() . '/services');
    }


    public function multi_delete(Request $request)
    {
        $data = $request->input('selected_data');
        if(is_array($data)){
            Service::destroy($data);
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/services');
        }
        else {
            $department = Service::find($data);
            $department->delete();
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/services');
        }
    }





}
