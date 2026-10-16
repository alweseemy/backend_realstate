<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\DataTables\UnitContractsDataTable;
use App\Http\DataTables\UnitsDatatable;
use App\Http\DataTables\UnitService_contractDataTable;
use App\Imports\FlatImport;
use App\Imports\UnitImport;
use App\Models\Agreement;
use App\Models\City;
use App\Models\Flat;
use App\Models\Hood;
use App\Models\Service_contract;
use App\Models\Unit;
use App\Models\UnitType;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Intervention\Image\ImageManager;

use App\Http\Controllers\UploadFiles as Upload;
use Session;

class UnitsController extends Controller
{


    public function index(UnitsDatatable $dataTable)
    {
        return $dataTable->render('admin.units.index',['title' => trans('orbscope.show-all').' '.trans('orbscope.units')]);
    }


    public function advanced_search(UnitsDatatable $dataTable){

        return $dataTable->render('admin.units.index',['title' => trans('orbscope.show-all').' '.trans('orbscope.units')]);

    }

    public function lease_contracts($id,UnitContractsDataTable $dataTable){


        $leads       = Unit::find($id);
        return $dataTable->LeadID($id)->render('admin.units.contract_index',compact('leads'),['title'=>trans('orbscope.show').' '.trans('orbscope.lease_contracts').' : '.$leads->name]);

    }

    public function service_contracts($id,UnitService_contractDataTable $dataTable){

        $unit       = Unit::find($id);
        return $dataTable->LeadID($id)->render('admin.service_contracts.index',compact('unit'),['title'=>trans('orbscope.show').' '.trans('orbscope.service_contracts').' : '.$unit->name]);


    }


    public function hood_ajax(Request $request){

        $hoods=Hood::where('city_id',$request->city_id)->get();
        $hood_id           = $request->old('hood_id');

        return view('admin.units.hood',compact('hoods','hood_id'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city        = City::where('status','active')->get();
        $Unit_type      = UnitType::all();
        if (auth()->user()->type=='admin'){
            $Developer      = User::where('type','owner')->get();
        }else{
            $Developer      = User::where('type','owner')->where('manger_id',auth()->id())->get();
        }
        return view('admin.units.create',['title'=> trans('orbscope.add').' '.trans('orbscope.units'),'cities'=>$city,'developers'=>$Developer,'unit_types'=>$Unit_type]);
    }

    public function add_flats(Request $request){
        $count=$request->counts;

        return view('admin.units.flats',compact('count'));

    }

    public function add_service(){

        return view('admin.units.new_service');

    }

    public function new_flat_line(){

        return view('admin.units.new_line');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {






       if (isset($request->add_user)){

           $m=preg_match('/1234|123|56789|567890|2222|1111|3333|5555|7777|8888|0000|9999|4444|234567|67890/', $request->id_number,$result );


           if(count(array_filter($result)) > 0){
               return redirect()->back()->withInput()->withErrors(['خطاء', 'يرجي ادخال صيغة صحيحة للرقم الهوية الوطنية']);

           }
           if (auth()->user()->type != 'admin')   {

               $rules = [
                   'name'      => 'required',
                   'name_user'      => 'required',
                   'phone'      => 'required',
                   'unit_type'   => 'required',
                   'uses'   => 'required',
                   'city_id' => 'required',
                   //'unites_number'     => 'required|numeric',
                   'id_number'   => 'required',
                   'passport_id'   => 'required',
                   'id_image'   => 'required',
                   'passport_image'   => 'required',
                   'email'    => 'required|email|unique:users',
               ];
           }else{
               $rules = [
                   'name'      => 'required',
                   'name_user'      => 'required',
                   'phone'      => 'required',
                   'unit_type'   => 'required',
                   'city_id' => 'required',
                   'uses' => 'required',
                   //'unites_number'     => 'required|numeric',
                   //'id_number'   => 'digits:10',
                   //'floors_number'   => 'required',
                   'email'        => 'required|email|unique:users',
               ];
           }
       }else{

           $rules = [
               'name'      => 'required',
               'unit_type'   => 'required',
               'city_id' => 'required',
               'owner_id'   => 'required',
               'uses'   => 'required',
               //'owner_id'   => 'required',
               //'unites_number'     => 'required|numeric',
               //'floors_number'   => 'required',
               //'iban_number'     => 'required',
           ];

       }
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'name'    =>trans('orbscope.name'),
            'email'    =>trans('orbscope.email'),
            'phone'    =>trans('orbscope.phone'),
            'name_user'    =>trans('orbscope.name').' '.trans('orbsope.owner'),
            'city_id'    =>trans('orbscope.cities'),
            'unit_type'    =>trans('orbscope.unit_type'),
            'hood_id'    =>trans('orbscope.hood'),
            'owner_id'    =>trans('orbscope.owner'),
            'id_number'    =>trans('orbscope.identy_id'),
            'uses'    =>trans('orbscope.uses'),
            'passport_image'    =>trans('orbscope.passport_image'),
            'id_image'    =>trans('orbscope.id_image'),
            'passport_id'    =>trans('orbscope.passport_id'),
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {

            if (isset($request->add_user)){
                $user=new User();
                $user->name =$request->name_user;
                $user->email =$request->email;
                $user->phone =$request->phone;
                $user->manger_id           = auth()->id();
                $user->birth_date           = $request->birth_date;
                $user->phone           = $request->phone;
                $user->id_number           = $request->id_number;
                $user->passport_id           = $request->passport_id;
                $user->nationality           = $request->nationality;
                $user->id_expiration_date          = $request->input('id_expiration_date');
                $user->passport_expiration_date          = $request->input('passport_expiration_date');
                if ($request->id_image != '' && $request->id_image != null) {
                    $uploaded_image  = Upload::uploadImages('customers', $request->id_image,'checkImages');
                    if($uploaded_image == 'false'){
                        return back()->withInput();
                    }else{
                        $user->id_image = $uploaded_image;
                    }
                }
                if ($request->passport_image != '' && $request->passport_image != null) {
                    $uploaded_image  = Upload::uploadImages('customers', $request->passport_image,'checkImages');
                    if($uploaded_image == 'false'){
                        return back()->withInput();
                    }else{
                        $user->passport_image = $uploaded_image;
                    }
                }
            $user->type ='owner';
            $user->save();
            }

            $units        = new Unit();
            $units->name         =$request->input('name');
            $units->unittype_id         =$request->input('unit_type');
            $units->user_id         =auth()->id();
            if (isset($request->add_user)){
                $units->owner_id         =$user->id;
            }else{
                $units->owner_id         =$request->input('owner_id');
            }
            $units->city_id         =$request->input('city_id');
            $units->hood_id         =$request->input('hood_id');

            if (count($request->uses)>0){
                $units->uses         =implode('|',$request->input('uses'));
            }
            $units->floors_number         =$request->input('floors_number');
            //$units->unites_number         =$request->input('unites_number');
            $units->extra_number         =$request->input('extra_number');
            $units->building_number         =$request->input('building_number');
            $units->deed_number         =$request->input('deed_number');
            $units->postal_code         =$request->input('postal_code');
            $units->electric_meter         =$request->input('electric_meter');
            $units->sewage_meter         =$request->input('sewage_meter');
            $units->water_meter         =$request->input('water_meter');
            $units->guard_id         =$request->input('guard_id');
            $units->address         =$request->input('address');
            $units->location_number         =$request->input('location_number');
            $images                  = $request->file('images');
            if(!empty($request->input('latitude'))){
                $lat = $request->input('latitude');
            }else {
                $lat = '24.1302';
            }

            if(!empty($request->input('longitude'))){
                $lang = $request->input('longitude');
            }else {
                $lang = '55.8023';
            }

            if(!empty($request->input('zoom'))){
                $zoom = $request->input('zoom');
            }else {
                $zoom = '7';
            }


            $units->latitude       = $lat;
            $units->longitude      = $lang;
            $units->zoom           = $zoom;
            if(!empty($images) && $images != ''){
                foreach ($images as $img){
                    $uploadedImages[]     = UploadFiles::uploadImages('units', $img,'allowExtFiles','false');
                }
                if($uploadedImages == 'false'){
                    return back()->withInput();
                }else{
                    $project_imgs = implode('|', $uploadedImages);
                    $units->files       = $project_imgs;
                }
            }

            $units->save();


            if ($units){


                if (isset($request->flat_type) && $request->flat_type!=null){

                    foreach ($request->flat_type as $key=>$value){

                        for ($x = 1; $x <= $request->flat_count[$key]; $x++) {

                            $flat=new Flat();
                            $flat->unit_id     =$units->id;
                            $flat->user_id     =auth()->id();
                            $flat->unit_number = $x;
                            $flat->flat_type_id   =$request->flat_type[$key];
                            $flat->room     =$request->bedrooms[$key];
                            $flat->bathroom =$request->bathrooms[$key];
                            $flat->area     =$request->input('area')[$key];
                            $flat->hall     =$request->hall[$key];
                            $flat->balcony     =$request->balcony[$key];
                            $flat->save();
                        }


                    }

                }
                if (isset($request->company_name) && $request->company_name[0]!=null){

                    foreach ($request->company_name as $key=>$value){

                        $servic=new Service_contract();
                        $servic->unit_id =$units->id;
                        $servic->company_name =$request->company_name[$key];
                        $servic->service_type =$request->service_type[$key];
                        $servic->amount       =$request->contract_value[$key];
                        $servic->start_date     =$request->start_date[$key];
                        $servic->end_date     =$request->end_date[$key];
                        $servic->save();


                    }

                }

                return redirect(AdminPath().'/units/'.$units->id);

            }else{


                return abort(404);

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
        $units     = Unit::find($id);
        return view('admin.units.show',['show'=>$units,'title'=>trans('orbscope.show').' '.trans('orbscope.units').' : '.$units->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $units          = Unit::find($id);
        $city        = City::where('status','active')->get();
        $Unit_type      = UnitType::all();
        if (auth()->user()->type=='admin'){
            $Developer      = User::where('type','owner')->get();
        }else{
            $Developer      = User::where('type','owner')->where('manger_id',auth()->id())->get();
        }
        return view('admin.units.edit',['edit'=>$units,
            'title'=>trans('orbscope.edit').' '.trans('orbscope.units').' : '.$units->name,
            'developers'=>$Developer,'unit_types'=>$Unit_type,'cities'=>$city,
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
            'name'      => 'required',
            'unit_type'   => 'required',
            'owner_id'   => 'required',
            'city_id' => 'required',
            'hood_id' => 'required',
            //'unites_number'     => 'required|numeric',
            //'floors_number'   => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([

            'name'    =>trans('orbscope.name'),
            'email'    =>trans('orbscope.email'),
            'phone'    =>trans('orbscope.phone'),
            'name_user'    =>trans('orbscope.name').' '.trans('orbsope.owner'),
            'city_id'    =>trans('orbscope.cities'),
            'unit_type'    =>trans('orbscope.unit_type'),
            'hood_id'    =>trans('orbscope.hood'),
            'owner_id'    =>trans('orbscope.owner'),

        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $units        = Unit::find($id);
            $units->name         =$request->input('name');
            $units->unittype_id         =$request->input('unit_type');
            $units->user_id         =auth()->id();
            $units->owner_id         =$request->input('owner_id');
            $units->city_id         =$request->input('city_id');
            $units->city_id         =$request->input('city_id');
            $units->hood_id         =$request->input('hood_id');
            if (count($request->uses)>0){
                $units->uses         =implode('|',$request->input('uses'));
            }
            $units->floors_number         =$request->input('floors_number');
            //$units->unites_number         =$request->input('unites_number');
            $units->extra_number         =$request->input('extra_number');
            $units->building_number         =$request->input('building_number');
            $units->deed_number         =$request->input('deed_number');
            $units->postal_code         =$request->input('postal_code');
            $units->electric_meter         =$request->input('electric_meter');
            $units->sewage_meter         =$request->input('sewage_meter');
            $units->water_meter         =$request->input('water_meter');
            $units->guard_id         =$request->input('guard_id');
            $units->address         =$request->input('address');



            $oldImages = $request->input('oldImages');
            if ($request->has('oldImages')) {
                $deletedImages = array_diff(explode('|',$units->files),$oldImages);
            }else{
                $deletedImages = explode('|',$units->files);
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
                    $uploadedImages[]     = Upload::uploadImages('units', $img,'allowExtFiles');
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
                $units->files      = $project_imgs;
            }
            $units->latitude       = $request->latitude;
            $units->longitude       = $request->longitude;
            $units->zoom           = $request->zoom;

            $units->save();
            session()->flash('success',trans('orbscope.success'));
            return redirect(AdminPath().'/units/'.$units->id);

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
        $units = Unit::find($id);
        @$units->flats()->delete();
        @$units->service_contract()->delete();
        $units->delete();
        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect(AdminPath() . '/units');
    }



    public function upload_units(){

        return view('admin.units.upload',['title'=>trans('orbscope.upload').' '.trans('orbscope.units')]);

    }

    public function upload_apartments(){

        return view('admin.units.upload_apartments',['title'=>trans('orbscope.upload').' '.trans('orbscope.apartments')]);

    }

    public function importExcel(Request $request){
        if ($request->hasFile('import_file')) {
            $path = $request->file('import_file');
            $delimiter = $request->input('delimiter');

            // Check CSV Extention
            if (!checkFiles($path->getClientOriginalName())) {
                session()->flash('error', trans('orbscope.select_file') . " " . trans('orbscope.type_csv'));
                return redirect()->back();
            }
            try {


                //Excel::import(new UnitImport,request()->file('import_file'));
                //$array = Excel::import(new \App\Imports\ProductImport($request->cat_id, $request->company_id), $path, null, \Maatwebsite\Excel\Excel::CSV);
                $array = Excel::import(new UnitImport(), $path, null, \Maatwebsite\Excel\Excel::CSV);

            }
            catch (exception $e) {

                session()->flash('error',trans('orbscope.error'));
                return redirect()->back();
            }

            session()->flash('success',trans('orbscope.success'));
            return redirect()->back();



            // return view('admin.product.upload_data',['headers'=>$headers,'has_header'=>$header,'row'=>$rows,'data'=>$fileData,'title'=>trans('orbscope.upload-file').' : '.trans('orbscope.categorys'),'brand'=>$brand,'color'=>$color,'supplier'=>$supplier,'shop'=>$shop]);

        }

    }

    public function apartmentsExcel(Request $request){

        if ($request->hasFile('import_file')) {
            $path = $request->file('import_file');
            $delimiter = $request->input('delimiter');

            // Check CSV Extention
            if (!checkFiles($path->getClientOriginalName())) {
                session()->flash('error', trans('orbscope.select_file') . " " . trans('orbscope.type_csv'));
                return redirect()->back();
            }
            try {


                //Excel::import(new UnitImport,request()->file('import_file'));
                //$array = Excel::import(new \App\Imports\ProductImport($request->cat_id, $request->company_id), $path, null, \Maatwebsite\Excel\Excel::CSV);
                $array = Excel::import(new FlatImport(), $path, null, \Maatwebsite\Excel\Excel::CSV);

            }
            catch (exception $e) {

                session()->flash('error',trans('orbscope.error'));
                return redirect()->back();
            }

            session()->flash('success',trans('orbscope.success'));
            return redirect()->back();



            // return view('admin.product.upload_data',['headers'=>$headers,'has_header'=>$header,'row'=>$rows,'data'=>$fileData,'title'=>trans('orbscope.upload-file').' : '.trans('orbscope.categorys'),'brand'=>$brand,'color'=>$color,'supplier'=>$supplier,'shop'=>$shop]);

        }

    }





}
