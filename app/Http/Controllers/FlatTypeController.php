<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\DataTables\FlatTypeDataTable;
use App\Models\Flat_type;
use Validator;
use Illuminate\Http\Request;

use Illuminate\Http\File;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\UploadFiles as Upload;
use Session;


class FlatTypeController extends Controller
{

    
    public function index(FlatTypeDataTable $dataTable)
    {
        return $dataTable->render('admin.flat_type.index',['title' => trans('orbscope.show-all').' '.trans('orbscope.flat_types')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       ;
        return view('admin.flat_type.create',['title'=> trans('orbscope.add').' '.trans('orbscope.flat_type')]);
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
            'ar_name'    => 'required',

        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'ar_name'  =>trans('orbscope.ar-name'),

        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $city = new Flat_type();


            $city->name           = $request->input('ar_name');


            $city->save();


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


    public function edit($id)
    {
        $flat_type = Flat_type::find($id);
        return view('admin.flat_type.edit',['edit'=>$flat_type,'title'=>trans('orbscope.edit').' '.trans('orbscope.flat_type').' : '.$flat_type->name ]);
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
            'ar_name'    => 'required',


        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'ar_name'  =>trans('orbscope.ar-name'),


        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $city = Flat_type::find($id);


            $city->name           = $request->input('ar_name');
            $city->save();

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
        $flat_type = Flat_type::find($id);
        $flat_type->delete();

        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect(AdminPath() . '/flat_type');
    }


    public function multi_delete(Request $request)
    {
        $data = $request->input('selected_data');
        if(is_array($data)){

            foreach ($data as $record){
                $flat_type = Flat_type::find($record);

            }
            Flat_type::destroy($data);
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/flat_type');
        }
        else {
            $flat_type = Flat_type::find($data);
            $flat_type->delete();
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/flat_type');
        }
    }









}
