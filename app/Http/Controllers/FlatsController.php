<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

use App\Http\DataTables\UnitFlats;
use App\Models\City;
use App\Models\Flat;
use App\Models\Unit;
use App\Models\UnitType;
use App\Models\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Intervention\Image\ImageManager;
use App\Http\Controllers\UploadFiles as Upload;


use Session;

class FlatsController extends Controller
{


    public function index(UnitFlats $dataTable)
    {
        return $dataTable->render('admin.flats.index',['title' => trans('orbscope.show-all').' '.trans('orbscope.flats')]);
    }

    public function show_flats($id,UnitFlats $dataTable){

        $unit       = Unit::find($id);
        return $dataTable->LeadID($id)->render('admin.flats.index',compact('unit'),['title'=>trans('orbscope.show').' '.trans('orbscope.apartments').' : '.$unit->name]);
    }


    public function multi_edit(Request $request,$id){

        $unit=Unit::findOrFail($id);
        $flats=Flat::whereIn('id',$request->selected_data)->get();


        return view('admin.flats.multi_edit',compact('flats','unit'),['title'=>trans('orbscope.edit').' '.trans('orbscope.apartments')]);
    }


    public function update_multi_edit(Request $request){

        foreach ($request->flat_id as $k=>$v){
            $flat=Flat::find($v);
            $flat->unit_number =$request->unit_number[$k];
            $flat->area =$request->area[$k];
            $flat->electric =$request->electric[$k];
            $flat->water =$request->water[$k];
            $flat->room =$request->room[$k];
            $flat->hall =$request->hall[$k];
            $flat->bathroom =$request->bathroom[$k];
            $flat->floor =$request->floor[$k];
            $flat->save();
        }
        session()->flash('success',trans('orbscope.success'));
        return redirect(url('admin/units/'.$request->unit_id.'/flats'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_flat($id)
    {
        $unit        = Unit::findOrFail($id);
        return view('admin.flats.create',compact('unit'),['title'=> trans('orbscope.add').' '.trans('orbscope.apartment').' '.$unit->name]);
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
            //'name'      => 'required',
            'area'   => 'required',
            'unit_number'   => 'required',
            'flat_type_id'   => 'required',


        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            //'name'    =>trans('orbscope.name'),
            'area'    =>trans('orbscope.area'),
            'flat_type_id'    =>trans('orbscope.flat_type'),
            'unit_number'    =>trans('orbscope.unit_number')
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {

            $flats        = new Flat();
            //$flats->name         =$request->input('name');
            $flats->flat_type_id         =$request->input('flat_type_id');
            $flats->unit_id         =$request->input('unit_id');
            $flats->user_id         =auth()->id();
            $flats->area         =$request->input('area');
            $flats->unit_number         =$request->input('unit_number');
            $flats->electric         =$request->input('electric');
            $flats->water         =$request->input('water');
            $flats->room         =$request->input('room');
            $flats->hall         =$request->input('hall');
            $flats->floor         =$request->input('floor');
            $flats->bathroom         =$request->input('bathroom');
            $flats->balcony         =$request->input('balcony');
            $flats->sewage_meter         =$request->input('sewage_meter');
            $images                  = $request->file('images');
            if($request->input('services') != '' && !empty($request->input('services'))){
                $services     = implode('|',$request->input('services'));
            }else{
                $services ='';
            }
            $flats->services       = $services;
            if(!empty($images) && $images != ''){
                foreach ($images as $img){
                    $uploadedImages[]     = Upload::uploadImages('flats', $img,'checkImages','false');
                }
                if($uploadedImages == 'false'){
                    return back()->withInput();
                }else{
                    $project_imgs = implode('|', $uploadedImages);
                    $flats->images       = $project_imgs;
                }
            }
            $flats->save();

            session()->flash('success',trans('orbscope.success'));
            if($request->action=='save'){

                return redirect(AdminPath().'/flats/'.$flats->id);

            }else{
                return redirect()->back();
            }

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
        $flats     = Flat::find($id);
        $services    = explode('|',$flats->services);
        return view('admin.flats.show',compact('services'),['show'=>$flats,'title'=>trans('orbscope.show').' '.' : '.$flats->unit_number]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flats          = Flat::find($id);
        $services    = explode('|',$flats->services);
        return view('admin.flats.edit',compact('services'),['edit'=>$flats,
            'title'=>trans('orbscope.edit').' '.trans('orbscope.apartment').' : '.$flats->unit_number,
        ]);
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
           // 'name'      => 'required',
            'area'   => 'required',
            'unit_number'   => 'required',
            'flat_type_id'   => 'required',


        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
           // 'name'    =>trans('orbscope.name'),
            'area'    =>trans('orbscope.area'),
            'unit_number'    =>trans('orbscope.unit_number'),
            'flat_type_id'    =>trans('orbscope.flat_type'),
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $flats        = Flat::find($id);
           // $flats->name         =$request->input('name');
            $flats->user_id         =auth()->id();
            $flats->flat_type_id         =$request->input('flat_type_id');
            $flats->area         =$request->input('area');
            $flats->unit_number         =$request->input('unit_number');
            $flats->electric         =$request->input('electric');
            $flats->water         =$request->input('water');
            $flats->room         =$request->input('room');
            $flats->hall         =$request->input('hall');
            $flats->floor         =$request->input('floor');
            $flats->bathroom         =$request->input('bathroom');
            $flats->balcony         =$request->input('balcony');
            $flats->sewage_meter         =$request->input('sewage_meter');

            //$images                  = $request->file('images');
            if($request->input('services') != '' && !empty($request->input('services'))){
                $services     = implode('|',$request->input('services'));
            }else{
                $services ='';
            }
            $flats->services       = $services;

            $oldImages = $request->input('oldImages');
            if ($request->has('oldImages')) {
                $deletedImages = array_diff(explode('|',$flats->images),$oldImages);
            }else{
                $deletedImages = explode('|',$flats->images);
            }

            // dd($oldImages);
            if (is_array($deletedImages)) {
                foreach ($deletedImages as $img) {
                    @unlink('uploads/'.$img);
                }
            }
            if($request->hasFile('images')){
                $images = $request->file('images');
                foreach ($images as $img){
                    $uploadedImages[]     = Upload::uploadImages('flats', $img,'checkImages','false');
                }
            }else{
                $uploadedImages = [];
            }
            // dd(array_diff($uploadedImages,$oldImages));
            if (is_array($oldImages)) {
                $allImages = array_merge($uploadedImages,$oldImages);
            }else{
                $allImages = $uploadedImages;
            }
            // dd($allImages);
            $project_imgs = implode('|', $allImages);
            if($uploadedImages == 'false'){
                return back()->withInput();
            }else{
                $flats->images       = $project_imgs;
            }

            $flats->save();
            session()->flash('success',trans('orbscope.success'));
            return redirect(AdminPath().'/flats/'.$flats->id);

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
        $flats = Flat::find($id);
        $unit_id=$flats->unit_id;
        $flats->delete();
        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect(AdminPath() . '/units/'.$unit_id.'/flats');
    }





}
