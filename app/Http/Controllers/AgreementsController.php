<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

use App\Http\DataTables\AgreementsDataTable;
use App\Http\DataTables\UnitAgreements;
use App\Models\Agreement;
use App\Models\Flat;
use App\Models\Unit;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Intervention\Image\ImageManager;


use Session;

class AgreementsController extends Controller
{


    public function index(AgreementsDataTable $dataTable)
    {
        return $dataTable->render('admin.agreements.index',['title' => trans('orbscope.show-all').' '.trans('orbscope.management_contracts')]);
    }


    public function units_agreements($id,AgreementsDataTable $dataTable){
        //$unit=Unit::findOrFail($id);
        return $dataTable->render('admin.agreements.index',['title' => trans('orbscope.show-all').' '.'الاتفاقيات']);

        //return $dataTable->LeadID($id)->render('admin.agreements.index',['title'=>trans('orbscope.show').' '.'اتفاقيات عقار'.' : '.$unit->name]);

    }


    public function create()
    {
        if (auth()->user()->type=='admin'){
            $shop = Unit::all();
        }else{

            $shop = Unit::where('user_id',auth()->id())->get();
        }

        return view('admin.agreements.create',['title'=> trans('orbscope.add').' '.trans('orbscope.management_contract'),'units'=>$shop]);
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
            'unit_id'      => 'required',
            //'month'   => 'required',
            'fee' => 'required',

        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'unit_id'    =>'العقار',
            //'month'    =>'month',
            'fee'    =>'fee',

        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $unit=Unit::findOrFail($request->unit_id);
            if (!empty($unit->argument)){

             return redirect()->back()->withInput()->withErrors(['msg' => 'هذا العقار لديه اتفاقية بالفعل']);

            }
            $flats        = new Agreement();
            $flats->owner_id         =$unit->owner_id;
            $flats->unit_id         =$request->input('unit_id');
            $flats->manger_id         =auth()->id();
            $flats->start_date         =$request->input('start_date');
            $flats->end_date         =$request->input('end_date');
            $flats->fee         =$request->input('fee');
            $images                  = $request->file('images');
            if(!empty($images) && $images != ''){
                foreach ($images as $img){
                    $uploadedImages[]     = UploadFiles::uploadImages('agreements', $img,'checkImages','false');
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
            return redirect(AdminPath().'/agreements/'.$flats->id);


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
        $flats     = Agreement::find($id);
        return view('admin.agreements.show',['show'=>$flats,'title'=>trans('orbscope.show') .' '.trans('orbscope.management_contract').' :'.' '.@$flats->unit->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flats          = Agreement::find($id);
        if (auth()->user()->type=='admin'){
            $shop = Unit::all();
        }else{

            $shop = Unit::where('user_id',auth()->id())->get();
        }
        return view('admin.agreements.edit',['edit'=>$flats,'units'=>$shop,
            'title'=>trans('orbscope.edit').' '.trans('orbscope.management_contract'),
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
            'unit_id'      => 'required',
            //'month'   => 'required',
            'fee' => 'required',


        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'unit_id'    =>'العقار',
            //'month'    =>'month',
            'fee'    =>'fee',

        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $flats        = Agreement::find($id);
            $unit=Unit::findOrFail($request->unit_id);
            $flats->owner_id         =$unit->owner_id;
            $flats->unit_id         =$request->input('unit_id');
           // $flats->month         =$request->input('month');
            $flats->fee         =$request->input('fee');
            $flats->start_date         =$request->input('start_date');
            $flats->end_date         =$request->input('end_date');
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
                    $uploadedImages[]     = UploadFiles::uploadImages('agreements', $img,'checkImages','false');
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
            return redirect(AdminPath().'/agreements/'.$flats->id);

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
        $flats = Agreement::find($id);
        $flats->delete();
        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect(AdminPath() . '/agreements');
    }





}
