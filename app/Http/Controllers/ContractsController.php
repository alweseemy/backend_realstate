<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

use App\Http\DataTables\ContractsDataTable;
use App\Models\Agreement;
use App\Models\Bank_check;
use App\Models\Contract;
use App\Models\Flat;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Unit;
use App\Models\User;
use Carbon\Carbon;
use Validator;
use App\Http\Controllers\UploadFiles as Upload;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Intervention\Image\ImageManager;
use Barryvdh\DomPDF\Facade\Pdf;


use Session;

class ContractsController extends Controller
{


    public function index(ContractsDataTable $dataTable)
    {
        if (request()->has('date_from')){
            $datefrom=request('date_from');
        }else{

            $datefrom='';
        }
        if (request()->has('date_to')){
            $date_to=request('date_to');
        }else{

            $date_to='';
        }
        return $dataTable->render('admin.contracts.index',compact('date_to','datefrom'),['title' => trans('orbscope.show-all').' '.trans('orbscope.lease_contracts')]);
    }


    public function advanced_search(ContractsDataTable $dataTable){
        if (request()->has('date_from')){
            $datefrom=request('date_from');
        }else{

            $datefrom='';
        }
        if (request()->has('date_to')){
            $date_to=request('date_to');
        }else{

            $date_to='';
        }
        return $dataTable->render('admin.contracts.index',compact('date_to','datefrom'),['title' => trans('orbscope.show-all').' '.trans('orbscope.lease_contracts')]);

    }


    public function multi_pdf($id){
        $show=Contract::find($id);
        $invo =Invoice::where('contract_id',$id)->OrderBy('date','ASC');
        $pdf = PDF::loadView('multipdf', ['show'=>$show,'invo'=>$invo]);

        return $pdf->download('allinvoice.pdf');


    }


    public function edit_check($id){
        $edit=Bank_check::find($id);
        return view('admin.checks.edit',compact('edit'),['title'=>trans('orbscope.edit').' '.trans('orbscope.check').' '.$edit->number]);
    }

    public function edit_check_save($id,Request $request){


        $rules = [
            'bank_id'      => 'required',
            'from_date'   => 'required',
            'to_date' => 'required',
            'number' => 'required',
            'amount' => 'required',

        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'number'     =>trans('orbscope.bank_receipt_number'),
            'bank_id'     =>trans('orbscope.bank_name'),
            'amount'     =>trans('orbscope.amount_money').' '.trans('orbscope.checks'),
            'date_from'     =>trans('orbscope.date_range').' '.trans('orbscope.from'),
            'date_to'     =>trans('orbscope.date_range').' '.trans('orbscope.to'),

        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {

            $check=Bank_check::find($id);
            $check->number =$request->number;
            $check->status =$request->status;
            $check->bank_id =$request->bank_id;
            $check->amount =$request->amount;
            $check->from_date =$request->from_date;
            $check->to_date =$request->to_date;
            $check->details =$request->details;
            $check->save();

            if ($request->status=='received'){
                $contract=Contract::find($check->contract_id);
               $new=new Invoice();
               $new->owner_id = $contract->owner_id;
               $new->type = 1;
               $new->date = date('Y-m-d');
               $new->amount = $request->amount;
               $new->unit_id = $contract->unit_id;
               $new->flat_id = $contract->flat_id;
               $new->contract_id = $contract->id;
               $new->save();
            }

            session()->flash('success',trans('orbscope.success'));
            return redirect(AdminPath().'/contracts/'.$check->contract_id);
        }
    }

    public function delete_check($id){
         $check=Bank_check::find($id);
        $check->delete();
        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect()->back();
    }





    public function units_ajax(Request $request){

        $flats=Flat::where('unit_id',$request->unit)->where('flat_type_id','!=',3)->where('status','notrent')->get();


        return view('admin.contracts.flats',compact('flats'));

    }

    public function garage_ajax(Request $request){

        $garage=Flat::where('unit_id',$request->unit)->where('flat_type_id',3)->where('status','notrent')->get();


        return view('admin.contracts.garage',compact('garage'));

    }

    public function flats_all(Request $request){
        $flats=Flat::where('unit_id',$request->unit)->get();
        $flat_id            = $request->old('flat_id');
        return view('admin.contracts.flats',compact('flats','flat_id'));

    }

    public function rent_end(Request $request){

        // dd($request->all());
        $date= Carbon::parse($request->date)->addMonth($request->month)->format('Y-m-d');

        return view('admin.contracts.buttons.date',compact('date'));

    }




    public function create()
    {
        if (auth()->user()->type=='admin'){
            $shop = Unit::all();
            $users=User::where('type','user')->get();
        }else{

            $shop = Unit::where('user_id',auth()->id())->get();
            $users=User::where('type','user')->where('manger_id',auth()->id())->get();
        }

        return view('admin.contracts.create',['title'=> trans('orbscope.add').' '.trans('orbscope.lease_contract'),'units'=>$shop,'users'=>$users]);
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
            if (auth()->user()->type=='admin'){
                $rules = [
                    'unit_id'      => 'required',
                    'flat_id'      => 'required',
                    'id_number'      => 'required',
                    'name'      => 'required',
                    'start_date'   => 'required',
                    'end_date'   => 'required',
                    //'month'     => 'required|integer',
                    'price'     => "required|regex:/^\d+(\.\d{1,2})?$/",
                    'period'     => 'required',
                    'email'    => 'required|email|unique:users',

                ];

            }else{

                $rules = [
                    'unit_id'      => 'required',
                    'flat_id'      => 'required',
                    'id_number'      => 'required',
                    'name'      => 'required',
                    'start_date'   => 'required',
                    'end_date'   => 'required',
                   // 'month'     => 'required|integer',
                    'price'     => "required|regex:/^\d+(\.\d{1,2})?$/",
                    'period'     => 'required',
                    'email'    => 'required|email|unique:users',
                    'passport_id'   => 'required',
                    'id_image'   => 'required',
                    'passport_image'   => 'required',

                ];
            }

            $validator = Validator::make($request->all(),$rules);
            $validator->SetAttributeNames([
                'unit_id'    =>trans('orbscope.unit'),
                'flat_id'    =>trans('orbscope.apartment'),
                'start_date'    =>trans('orbscope.start_date'),
                'end_date'    =>trans('orbscope.end_date'),
                'user_id'    =>trans('orbscope.user'),
                'price'    =>trans('orbscope.annual_rent_amount'),
                //'month'    =>trans('orbscope.date_range'),
                'period'    =>trans('orbscope.rental_cycle'),
                'name'    =>trans('orbscope.name'),
                'id_number'    =>trans('orbscope.identy_id'),
                'passport_image'    =>trans('orbscope.passport_image'),
                'id_image'    =>trans('orbscope.id_image'),
                'passport_id'    =>trans('orbscope.passport_id'),
            ]);

        }else{

            $rules = [
                'unit_id'      => 'required',
                'flat_id'      => 'required',
                'start_date'   => 'required',
                'user_id' => 'required',
                'end_date' => 'required',
                //'month'     => 'required|integer',
                'price'     => "required|not_in:0|regex:/^\d+(\.\d{1,2})?$/",
                'period'     => 'required',

            ];
            $validator = Validator::make($request->all(),$rules);
            $validator->SetAttributeNames([
                'unit_id'    =>trans('orbscope.unit'),
                'flat_id'    =>trans('orbscope.apartment'),
                'start_date'    =>trans('orbscope.start_date'),
                'end_date'    =>trans('orbscope.end_date'),
                'user_id'    =>trans('orbscope.user'),
                'price'    =>trans('orbscope.annual_rent_amount'),
                //'month'    =>trans('orbscope.date_range'),
                'period'    =>trans('orbscope.rental_cycle'),
            ]);

        }
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {



            $newflat=Flat::find($request->flat_id);
            if (!isset($request->old_contract)) {
                if ($newflat->status == 'rented') {

                    return redirect()->back()->withInput()->withErrors(['msg' => 'لا يمكن استاجر هذه الوحدة لانها مستاجره بالفعل']);
                }
            }

            if (isset($request->add_user)) {
                $customer = new User();
                $customer->name = $request->input('name');
                $customer->email = $request->input('email');
                $customer->type = 'user';
                $customer->manger_id = auth()->id();
                $customer->nationality = $request->nationality;
                $customer->phone = $request->phone;
                $customer->id_number = $request->id_number;
                if ($request->id_image != '' && $request->id_image != null) {
                    $uploaded_image = Upload::uploadImages('customers', $request->id_image, 'checkImages');
                    if ($uploaded_image == 'false') {
                        return back()->withInput();
                    } else {
                        $customer->id_image = $uploaded_image;
                    }
                }
                if ($request->passport_image != '' && $request->passport_image != null) {
                    $passport_image = Upload::uploadImages('customers', $request->passport_image, 'checkImages');
                    if ($passport_image == 'false') {
                        return back()->withInput();
                    } else {
                        $customer->passport_image = $passport_image;
                    }
                }
                $customer->save();
            }
            
            $flats        = new Contract();
            //$end=Carbon::parse($request->input('start_date'))->addMonth($request->input('month'));
            $flats->contract_number     =generateContractNumber();
            $unit=Unit::findOrFail($request->input('unit_id'));
            $flats->unit_id             =$request->input('unit_id');
            $flats->manger_id           =$unit->user_id;
            $flats->owner_id            =$unit->owner_id;
            $flats->start_date           =strtotime($request->input('start_date'));
            $flats->end_date             =strtotime($request->input('end_date'));
            if (isset($request->add_user)) {

                $flats->user_id         =$customer->id;
            }else{
                $flats->user_id         =$request->input('user_id');
            }
            //$flats->month         =$request->input('month');
            if (isset($request->flat_id) && $request->flat_id!=null){
                $flats->flat_id         =$request->flat_id;
            }
            $flats->price         =$request->input('price');
            $flats->amount         =$request->input('amount');
            $flats->credit_amount         =$request->input('credit_amount');
            $flats->insurance_credit         =$request->input('insurance_credit');
            ///$flats->electricity_fee         =$request->input('electricity_fee');
            ///$flats->water_fee         =$request->input('water_fee');
            //$flats->gas_fee         =$request->input('gas_fee');
            //$flats->other_fees         =$request->input('other_fees');
            $flats->insurance         =$request->input('insurance');
            $flats->period         =$request->input('period');
            $flats->unit_insurance_type         =$request->input('unit_insurance_type');
            $flats->unit_insurance_value         =$request->input('unit_insurance_value');
            $flats->amount_bank                 =$request->input('amount_bank');
            $flats->bank_id                      =$request->input('bank_id');
            $flats->garage_rent_amount         =$request->input('garage_rent_amount');
            $flats->garage_id         =$request->input('garage_id');
            $flats->details         =$request->input('details');
            $images                  = $request->file('images');
            if(!empty($images) && $images != ''){
                foreach ($images as $img){
                    $uploadedImages[]     = UploadFiles::uploadImages('contract', $img,'allowExtFiles','false');
                }
                if($uploadedImages == 'false'){
                    return back()->withInput();
                }else{
                    $project_imgs = implode('|', $uploadedImages);
                    $flats->images       = $project_imgs;
                }
            }

            $flats->save();
            if (isset($request->flat_id) && $request->flat_id!=null){

                $flat=Flat::findOrFail($request->flat_id);
                $flat->status ='rented';
                $flat->save();
            }
            if (isset($request->garage_id) && $request->garage_id!=null){

                $flat=Flat::findOrFail($request->garage_id);
                $flat->status ='rented';
                $flat->save();

            }

            if (isset($request->old_contract)  && $request->old_contract != null){
               $contract=Contract::find($request->old_contract);
               $contract->status ='done';
               $contract->save();
            }

            session()->flash('success',trans('orbscope.success'));
            return redirect(AdminPath().'/contracts/'.$flats->id);


        }
    }



    public function renew_contract($id){
        $edit=Contract::findOrFail($id);

         return view('admin.contracts.renew',compact('edit'),['title'=>trans('front.renew').' '.trans('orbscope.lease_contract').' '.$edit->contract_number]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flats     = Contract::find($id);
        $invo =Invoice::where('contract_id',$id)->OrderBy('date','ASC');
        return view('admin.contracts.show',compact('invo'),['show'=>$flats,'title'=>trans('orbscope.show').' '.trans('orbscope.lease_contract').' : '.@$flats->contract_number]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flat         = Contract::find($id);
          $shop = Unit::all();
         $users=User::where('type','user')->get();
         $flats=Flat::where('unit_id',$flat->unit_id)->get();
        return view('admin.contracts.edit',['edit'=>$flat,'units'=>$shop,'users'=>$users,'flats'=>$flats,
            'title'=>trans('orbscope.edit').' '.trans('orbscope.lease_contract'),
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
       // dd($request->all());
        $rules = [
            'unit_id'      => 'required',
            'start_date'   => 'required',
            'end_date'   => 'required',
            'user_id' => 'required',
            //'month'     => 'required',
            'price'     => 'required',
            'period'     => 'required',

        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'unit_id'    =>trans('orbscope.unit'),
            'flat_id'    =>trans('orbscope.apartment'),
            'start_date'    =>trans('orbscope.start_date'),
            'end_date'    =>trans('orbscope.end_date'),
            'user_id'    =>trans('orbscope.user'),
            'price'    =>trans('orbscope.annual_rent_amount'),
            'month'    =>trans('orbscope.date_range'),
            'period'    =>trans('orbscope.rental_cycle'),
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {


            $flats        = Contract::find($id);

            if ($request->status == 'done'){

                $invoice=Invoice::where('contract_id',$id)->sum('amount');

                if ($invoice < $flats->price){

                    return redirect()->back()->withInput()->withErrors(['msg'=>'لا يمكن انهاء العقد بدون دفع الايجار السنوي كاملا']);

                }

            }

            if ($request->flat_id!=null && $request->flat_id != $flats->flat_id){
                $flat=Flat::findOrFail($flats->flat_id);
                $flat->status ='notrent';
                $flat->save();

                $newflat=Flat::find($request->flat_id);
                $newflat->status ='rented';
                $newflat->save();

            }else{

                if ($request->status=='canceled' || $request->status =='done'){

                    $flat=Flat::find($flats->flat_id );
                    $flat->status ='notrent';
                    $flat->save();
                }else{

                    $flat=Flat::findOrFail($request->flat_id);
                    $flat->status ='rented';
                    $flat->save();

                }
            }

            if ($request->garage_id!=null && $request->garage_id != $flats->garage_id){
                $garage=Flat::find($flats->garage_id);
                if ($garage){
                    $garage->status ='notrent';
                    $garage->save();
                }
                $newgarage=Flat::find($request->garage_id);
                $newgarage->status ='rented';
                $newgarage->save();

            }else{

                if ($request->status=='canceled' || $request->status =='done'){

                    $garage_cancel=Flat::find($flats->garage_id );
                    if ($garage_cancel){
                        $garage_cancel->status ='notrent';
                        $garage_cancel->save();
                    }
                }else{

                    $new_garage_status=Flat::find($request->garage_id);
                    if ($new_garage_status){
                        $new_garage_status->status ='rented';
                        $new_garage_status->save();
                    }

                }
            }


            $flats->flat_id         =$request->flat_id;
            $flats->garage_id         =$request->garage_id;
            $unit=Unit::findOrFail($request->input('unit_id'));
            //$end=Carbon::parse($request->input('start_date'))->addMonth($request->input('month'));
            $flats->unit_id             =$request->input('unit_id');
            $flats->manger_id           =$unit->user_id;
            $flats->owner_id           =$unit->owner_id;
            $flats->start_date         =strtotime($request->input('start_date'));
            $flats->end_date         =strtotime($request->input('end_date'));
            $flats->user_id         =$request->input('user_id');
            //$flats->month         =$request->input('month');
            $flats->price         =$request->input('price');
            $flats->amount         =$request->input('amount');
            $flats->credit_amount         =$request->input('credit_amount');
            $flats->insurance_credit         =$request->input('insurance_credit');
            $flats->status         =$request->input('status');
            $flats->insurance         =$request->input('insurance');
            $flats->period         =$request->input('period');
            $flats->details         =$request->input('details');
            $flats->unit_insurance_type         =$request->input('unit_insurance_type');
            $flats->unit_insurance_value         =$request->input('unit_insurance_value');
            $flats->amount_bank                 =$request->input('amount_bank');
            $flats->bank_id                      =$request->input('bank_id');
            $flats->garage_rent_amount         =$request->input('garage_rent_amount');
            $flats->cnaceled_details         =$request->input('cnaceled_details');


            if($request->hasFile('canceled_images')){
                $canceled_images = $request->file('canceled_images');
                foreach ($canceled_images as $imgcan){
                    $uploadedcanceled[]     = Upload::uploadImages('contract', $imgcan,'allowExtFiles');
                }
                if($uploadedcanceled == 'false'){
                    return back()->withInput();
                }else{
                    $cancel_imgs = implode('|', $uploadedcanceled);
                    $flats->canceled_images       = $cancel_imgs;
                }
            }


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
                    $uploadedImages[]     = Upload::uploadImages('contract', $img,'allowExtFiles');
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
            return redirect(AdminPath().'/contracts/'.$flats->id);

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
        $contrat = Contract::find($id);
        if (!empty($contrat->flat_id) && $contrat->flat_id != null && $contrat->status =='progress'){
            $flat=Flat::find($contrat->flat_id);
            $flat->status ='notrent';
            $flat->save();

        }
        if (!empty($contrat->garage_id) && $contrat->garage_id != null && $contrat->status =='progress'){
            $garage=Flat::find($contrat->garage_id);
            $garage->status ='notrent';
            $garage->save();

        }
        $contrat->delete();
        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect(AdminPath() . '/contracts');
    }





}
