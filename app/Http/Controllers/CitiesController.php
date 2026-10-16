<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use Validator;
use Illuminate\Http\Request;
use App\Http\DataTables\CitiesDataTable;
use Illuminate\Http\File;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\UploadFiles as Upload;
use Session;


class CitiesController extends Controller
{

    
    public function index(CitiesDataTable $dataTable)
    {
        return $dataTable->render('admin.cities.index',['title' => trans('orbscope.show-all').' '.trans('orbscope.cities')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       ;
        return view('admin.cities.create',['title'=> trans('orbscope.add').' '.trans('orbscope.cities')]);
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
            $city = new City;


            $city->name           = $request->input('ar_name');
            $city->status         = $request->input('status');

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
        $cities = City::find($id);
        return view('admin.cities.edit',['edit'=>$cities,'title'=>trans('orbscope.edit').' '.trans('orbscope.cities').' : '.$cities->name ]);
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
            $city = City::find($id);


            $city->name           = $request->input('ar_name');
            $city->status         = $request->input('status');
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
        $cities = City::find($id);
        $cities->delete();

        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect(AdminPath() . '/cities');
    }


    public function multi_delete(Request $request)
    {
        $data = $request->input('selected_data');
        if(is_array($data)){

            foreach ($data as $record){
                $cities = City::find($record);

            }
            City::destroy($data);
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/cities');
        }
        else {
            $cities = City::find($data);
            $cities->delete();
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/cities');
        }
    }









}
