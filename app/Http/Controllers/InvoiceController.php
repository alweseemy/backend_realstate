<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

use App\Http\DataTables\InvoiceDataTable;
use App\Http\DataTables\PaymentsDataTable;
use App\Models\Agreement;
use App\Models\Bank_check;
use App\Models\Contract;
use App\Models\Flat;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Validation\Rules\In;
use Validator;
use App\Http\Controllers\UploadFiles as Upload;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Intervention\Image\ImageManager;
use Barryvdh\DomPDF\Facade\Pdf;

use Session;

class InvoiceController extends Controller
{


    public function index(InvoiceDataTable $dataTable)
    {
        return $dataTable->render('admin.invoice.index',['title' => trans('orbscope.show-all').' '.trans('orbscope.invoices')]);
    }


    public function get_print($id){

        $show=Invoice::find($id);

        return view('admin.invoice.print',compact('show'));


    }

    public function rent_invo_print($id){

        $show=Invoice::find($id);

        return view('admin.invoice.rent_print',compact('show'));
    }

    public function add_new_chekline(){

        return view('admin.invoice.new_chekline');
    }

    public function createPDF($id) {

        $show=Invoice::find($id);
          //return view('testpdf',['show'=>$show]);
           //$pdf = PDF::loadView('admin.invoice.pdf', ['show'=>$show]);
           $pdf = PDF::loadView('testpdf', ['show'=>$show]);

            return $pdf->download('rentinvoice.pdf');

    }

    public function make_payment($id,$type){
          $contract =Contract::find($id);
          //dd($contract);
        //$payment=Payment::findOrFail($id);
       // dd($type);

        //$net=round($payment->amount+$payment->water_fee+$payment->electricity_fee+$payment->other_fees+$payment->gas_fee);

            $units = Unit::all();
            $flats=Flat::where('unit_id',$contract->unit_id)->get();

     return view('admin.invoice.payments',compact('contract','units','flats','type'),['title'=>trans('orbscope.rent_collection_invoices_Contract_no').' '.$contract->contract_number]);
    }


    public function units_ajax(Request $request){

      $flats=Flat::where('unit_id',$request->unit)->get();
      $flat_id            = $request->old('flat_id');
      return view('admin.invoice.flats',compact('flats','flat_id'));

    }

    




    public function create()
    {
        if (auth()->user()->type=='admin'){
            $shop = Unit::all();
        }else{

            $shop = Unit::where('user_id',auth()->id())->get();
        }

        return view('admin.invoice.create',['title'=> trans('orbscope.add').' '.trans('orbscope.invoice'),'units'=>$shop]);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {



        if (isset($request->payment_id) && $request->payment_id != null){
           if ($request->bank_id[0]  != null ||  $request->number[0] != null || $request->amount_check[0] != null){
               $request->validate([

                  'number.*'    => 'required',
                  'bank_id.*'       => 'required',
                  'amount_check.*'    => 'required',
                  'date_from.*'    => 'required',
                  'date_to.*'    => 'required',
               ]);
              /*
               $validator->SetAttributeNames([
                   'number.*'     =>trans('orbscope.bank_receipt_number'),
                   'bank_id.*'     =>trans('orbscope.bank_name'),
                   'amount_check.*'     =>trans('orbscope.amount_money').' '.trans('orbscope.checks'),
                   'date_from.*'     =>trans('orbscope.date_range').' '.trans('orbscope.from'),
                   'date_to.*'     =>trans('orbscope.date_range').' '.trans('orbscope.to'),

               ]);*/
           }

        }
            $rules = [
                'unit_id'      => 'required',
                //'flat_id'      => 'required',
                'date'   => 'required',

            ];
            $validator = Validator::make($request->all(),$rules);
            $validator->SetAttributeNames([
                'unit_id'    =>trans('orbsope.unit'),
                //'flat_id'    =>'الوحدة',
                'date'    =>trans('orbscope.date'),
            ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {

            $flats        = new Invoice();
            $unit=Unit::findOrFail($request->input('unit_id'));
            $flats->unit_id             =$request->input('unit_id');
            $flats->flat_id             =$request->input('flat_id');
            $flats->manger_id           =$unit->user_id;
            $flats->owner_id           =$unit->owner_id;
            $flats->type               =$request->input('type');
            if ($request->type == 1){
                $contract=Contract::where('unit_id',$unit->id)->where('flat_id',$request->flat_id)->OrderBy('id','desc')->first();
                if ($contract != null){
                    $flats->contract_id = $contract->id;
                }
            }
            $flats->date               =$request->input('date');
            if (isset($request->money_type) && $request->money_type=='bank_receipt') {


                $flats->money_type = $request->input('money_type');

                $flats->bank_id = $request->input('bank_id');
                $flats->bank_receipt_number = $request->input('bank_receipt_number');


            }elseif (isset($request->money_type) && $request->money_type=='cash_money'){


                $flats->money_type = $request->input('money_type');
            }

            $flats->amount             =$request->input('amount');
            $flats->details             =$request->input('details');
            $main_image             = $request->file('main_image');
            if(!empty($main_image) && $main_image != ''){
                foreach ($main_image as $img){
                    $uploadedImages[]     = Upload::uploadImages('invoices', $img,'allowExtFiles','false');
                }
                if($uploadedImages == 'false'){
                    return back()->withInput();
                }else{
                    $tcl = implode('|', $uploadedImages);
                    $flats->image       = $tcl;
                }
            }
           $flats->save();


            if (isset($request->payment_id) && $request->payment_id != null){
                $inv=Invoice::find($flats->id);
                $inv->contract_id   =  $request->payment_id;
                $inv->save();

                if ($request->number[0] != null){
                         $contract=Contract::find($request->payment_id);
                    foreach ($request->number as $k=>$v){

                        $new=new Bank_check();
                        $new->user_id =$contract->user_id;
                        $new->contract_id =$contract->id;
                        $new->invoice_id =$flats->id;
                        $new->flat_id =$request->flat_id;
                        $new->unit_id =$request->unit_id;
                        $new->number =$request->number[$k];
                        $new->amount =$request->amount_check[$k];
                        $new->bank_id =$request->bank_id[$k];
                        $new->from_date =$request->date_from[$k];
                        $new->to_date =$request->date_to[$k];
                        $new->details =$request->notes[$k];
                        $new->save();
                    }
                }

                session()->flash('success',trans('orbscope.success'));
                return redirect(AdminPath().'/contracts/'.$request->payment_id);

            }
            //dd($request->all(),'no');
            session()->flash('success',trans('orbscope.success'));
            return redirect(AdminPath().'/invoice/'.$flats->id);


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
        $flats     = Invoice::find($id);
        return view('admin.invoice.show',['show'=>$flats,'title'=>trans('orbscope.show').' '.trans('orbscope.invoice')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flat         = Invoice::find($id);
        if (auth()->user()->type=='admin'){
            $shop = Unit::all();
            $flats=Flat::where('unit_id',$flat->unit_id)->get();

        }else{

            $shop = Unit::where('user_id',auth()->id())->get();
            $flats=Flat::where('unit_id',$flat->unit_id)->get();

        }
        return view('admin.invoice.edit',['edit'=>$flat,'units'=>$shop,'flats'=>$flats,
            'title'=>trans('orbscope.edit').' '.trans('orbscope.invoice'),
        ]);
    }

    public function payments(PaymentsDataTable $dataTable){

        return $dataTable->render('admin.payments.index',['title' => trans('orbscope.show-all').' '.'فواتير الايجار المدفوعه']);

    }

    public function payment_delete($id){

        $payment=Payment::findOrFail($id);
        $invoice=Invoice::where('id',$payment->invoice_id)->first();
        if (!empty($invoice)){
            $invoice->delete();
        }
        $payment->delete();
        session()->flash('success', trans('orbscope.success'));
        return redirect()->back();


    }

    public function payment_show($id){
        $show=Payment::findOrFail($id);
        $net=$show->water_fee+$show->electricity_fee+$show->other_fees+$show->gas_fee;
        return view('admin.payments.show',compact('show','net'),['title'=>'عرض فاتورة رقم'.$show->invoce_number]);
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
            'flat_id'      => 'required',
            'date'   => 'required',
            'amount'     => 'required',

        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'unit_id'    =>'العقار',
            'flat_id'    =>'الوحدة',
            'start_date'    =>'تاريخ',
            'amount'    =>'ألمبلغ',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            //dd($request->all());
            $flats = Invoice::find($id);
            $unit=Unit::findOrFail($request->input('unit_id'));
            $flats->unit_id             =$request->input('unit_id');
            $flats->flat_id             =$request->input('flat_id');
            $flats->manger_id           =$unit->user_id;
            $flats->owner_id           =$unit->owner_id;
            $flats->type               =$request->input('type');
            $flats->date               =$request->input('date');
            $flats->amount             =$request->input('amount');
            $flats->details             =$request->input('details');
            $main_image             = $request->file('image');
            $main_image             = $request->file('main_image');
            if(!empty($main_image) && $main_image != ''){
                foreach ($main_image as $img){
                    $uploadedImages[]     = Upload::uploadImages('invoices', $img,'allowExtFiles','false');
                }
                if($uploadedImages == 'false'){
                    return back()->withInput();
                }else{
                    $tcl = implode('|', $uploadedImages);
                    $flats->image       = $tcl;
                }
            }
            $flats->save();
            session()->flash('success', trans('orbscope.success'));
            return redirect(AdminPath() . '/invoice/' . $flats->id);
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
        $contrat = Invoice::find($id);
        $contrat->delete();
        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect()->back();
    }





}
