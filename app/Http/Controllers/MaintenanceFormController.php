<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\DataTables\MaintenanceFormDataTable;
use App\Models\Maintenance_form;
use Validator;
use Illuminate\Http\Request;

use Illuminate\Http\File;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\UploadFiles as Upload;
use Session;


class MaintenanceFormController extends Controller
{

    
    public function index(MaintenanceFormDataTable $dataTable)
    {
        return $dataTable->render('admin.maintenance_form.index',['title' => trans('orbscope.show-all').' '.trans('front.maintenance_request_forms')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        $show = Maintenance_form::find($id);
        return view('admin.maintenance_form.show',['show'=>$show,'title'=>trans('orbscope.show').' '.trans('front.maintenance_request_form') ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $rules = [
            'name'    => 'required',
            'phone'    => 'required',


        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'name'  =>trans('orbscope.name'),
            'phone'  =>trans('orbscope.phone'),


        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $maintenance_form = new  Maintenance_form();


            $maintenance_form->name           = $request->input('name');
            $maintenance_form->phone           = $request->input('phone');
            $maintenance_form->unit           = $request->input('unit');
            $maintenance_form->apartment           = $request->input('apartment');
            $maintenance_form->maintenance_type           = $request->input('maintenance_type');
            $maintenance_form->details           = $request->input('details');
            $maintenance_form->save();

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
        $maintenance_form = Maintenance_form::find($id);
        $maintenance_form->delete();

        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect(AdminPath() . '/maintenance_form');
    }


    public function multi_delete(Request $request)
    {
        $data = $request->input('selected_data');
        if(is_array($data)){

            foreach ($data as $record){
                $maintenance_form = Maintenance_form::find($record);

            }
            City::destroy($data);
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/maintenance_form');
        }
        else {
            $maintenance_form = Maintenance_form::find($data);
            $maintenance_form->delete();
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/maintenance_form');
        }
    }









}
