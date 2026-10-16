<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

use App\Http\DataTables\OrdersDataTable;
use App\Models\Agreement;
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


use Session;

class OrdersController extends Controller
{


    public function index(OrdersDataTable $dataTable)
    {

        return $dataTable->render('admin.orders.index',['title' => trans('orbscope.show-all').' '.trans('orbscope.orders')]);
    }


    public function units_ajax(Request $request){

      $flats=Flat::where('unit_id',$request->unit)->get();
      //dd($flats,$request->unit);
      $flat_id            = $request->old('flat_id');

      return view('admin.orders.flats',compact('flats','flat_id'));

    }

    public function follow_up(){


            $flats=Flat::where('status','notrent')->count();
            $all_flats=Flat::where('status','notrent')->with('flattype')->get();
            $orders=Order::where('status','new')->count();
            $all_orders=Order::where('status','new')->get();




        return view('admin.follow_up.index',compact('flats','orders','all_flats','all_orders'));
    }





    public function create()
    {

            $shop = Unit::all();


        return view('admin.orders.create',['title'=> trans('orbscope.add').' '.trans('orbscope.order'),'units'=>$shop]);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //dd($request->all());

            $rules = [
                'unit_id'      => 'required',
                'amount'      => 'required',
                //'flat_id'      => 'required',
                'start_date'   => 'required',


            ];
            $validator = Validator::make($request->all(),$rules);
            $validator->SetAttributeNames([
                'unit_id'    =>trans('orbscope.unit'),
                'amount'    =>trans('orbscope.amount'),
                //'flat_id'    =>'الوحدة',
                'start_date'    =>trans('orbscope.date'),

            ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {


            $flats        = new Order();
            $unit=Unit::findOrFail($request->input('unit_id'));
            $flats->unit_id             =$request->input('unit_id');
            $flats->flat_id             =$request->input('flat_id');
            $flats->order_type             =$request->input('order_type');
            $flats->manger_id           =$unit->user_id;
            $flats->owner_id           =$unit->owner_id;
            $flats->date         =$request->input('start_date');
            $flats->applicant         =$request->input('applicant');
            $flats->amount         =$request->input('amount');
            $flats->details         =$request->input('details');
            $images        =$request->file('maintenance_attachments');

            if(!empty($images) && $images != ''){

                foreach ($images as $img){
                    $uploadedImages[]     = UploadFiles::uploadImages('maintenance', $img,'allowExtFiles','false');
                }
                if($uploadedImages == 'false'){
                    return back()->withInput();
                }else{
                    $project_imgs = implode('|', $uploadedImages);
                    $flats->maintenance_attachments       = $project_imgs;
                }
            }

            $files        =$request->file('invoice_attachments');
            if(!empty($files) && $files != ''){
                foreach ($files as $fil){
                    $uploadedfiles[]     = UploadFiles::uploadImages('maintenance', $fil,'allowExtFiles','false');
                }
                if($uploadedfiles == 'false'){
                    return back()->withInput();
                }else{
                    $project_files = implode('|', $uploadedfiles);
                    $flats->invoice_attachments       = $project_files;
                }
            }
            $flats->save();


            $new = new Invoice();
            $new->unit_id             =$request->input('unit_id');
            $new->flat_id             =$request->input('flat_id');
            $new->manger_id           =$unit->user_id;
            $new->owner_id            =$unit->owner_id;
            $new->type                =2;
            $new->maintenance_id                =$flats->id;
            $new->date               =$request->input('start_date');
            $new->amount             =$request->input('amount');
            $new->details             =$request->input('details');
            $new->image             =$flats->invoice_attachments;
            $new->save();

            session()->flash('success',trans('orbscope.success'));
            return redirect(AdminPath().'/orders/'.$flats->id);


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
        $flats     = Order::find($id);
        return view('admin.orders.show',['show'=>$flats,'title'=>trans('orbscope.show').' '.trans('orbscope.order')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $flat         = Order::find($id);
        if (auth()->user()->type=='admin'){
            $shop = Unit::all();
            $flats=Flat::where('unit_id',$flat->unit_id)->get();

        }else{

            $shop = Unit::where('user_id',auth()->id())->get();
            $flats=Flat::where('unit_id',$flat->unit_id)->get();

        }
        return view('admin.orders.edit',['edit'=>$flat,'units'=>$shop,'flats'=>$flats,
            'title'=>trans('orbscope.edit').' '.trans('orbscope.order'),
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
       //dd($request->all());
        $rules = [
            'unit_id'      => 'required',
            'amount'      => 'required',
            //'flat_id'      => 'required',
            'start_date'   => 'required',


        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'unit_id'    =>trans('orbscope.unit'),
            'amount'    =>trans('orbscope.amount'),
            //'flat_id'    =>'الوحدة',
            'start_date'    =>trans('orbscope.date'),

        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            //dd($request->all());
            $flats = Order::find($id);
            if ($request->status=='done' || $request->status=='canceled'){

                $flats->close_date =date('Y-m-d');
            }
            $unit = Unit::findOrFail($request->input('unit_id'));
            $flats->unit_id = $request->input('unit_id');
            $flats->flat_id = $request->input('flat_id');
            $flats->status = $request->input('status');
            $flats->order_type = $request->input('order_type');
            $flats->manger_id = $unit->user_id;
            $flats->owner_id = $unit->owner_id;
            $flats->date = $request->input('start_date');
            $flats->applicant         =$request->input('applicant');
            $flats->amount         =$request->input('amount');
            $flats->close_date         =$request->input('close_date');
            $flats->details         =$request->input('details');


            $oldImages = $request->input('oldMaintenance_attachments');
            if ($request->has('oldMaintenance_attachments')) {
                $deletedImages = array_diff(explode('|',$flats->maintenance_attachments),$oldImages);
            }else{
                $deletedImages = explode('|',$flats->maintenance_attachments);
            }

            // dd($oldImages);
            if (is_array($deletedImages)) {
                foreach ($deletedImages as $img) {
                    @unlink('uploads/'.$img);
                }
            }
            if($request->hasFile('maintenance_attachments')){
                $images = $request->file('maintenance_attachments');
                foreach ($images as $img){
                    $uploadedImages[]     = Upload::uploadImages('maintenance', $img,'allowExtFiles');
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
                $flats->maintenance_attachments       = $project_imgs;
            }

              ////////////////////////////////////////invoice
            $invoiceold = $request->input('oldInvoice_attachments');
            if ($request->has('oldInvoice_attachments')) {
                $deletedInvoice = array_diff(explode('|',$flats->invoice_attachments),$invoiceold);
            }else{
                $deletedInvoice = explode('|',$flats->invoice_attachments);
            }

            // dd($oldImages);
            if (is_array($deletedInvoice)) {
                foreach ($deletedInvoice as $dele) {
                    @unlink('uploads/'.$dele);
                }
            }
            if($request->hasFile('invoice_attachments')){
                $invoice_attachments = $request->file('invoice_attachments');
                foreach ($invoice_attachments as $invoice){
                    $uploadedInvo[]     = Upload::uploadImages('maintenance', $invoice,'allowExtFiles');
                }
            }else{
                $uploadedInvo = [];
            }
            // dd(array_diff($uploadedImages,$oldImages));
            if (is_array($invoiceold)) {
                $allImagInvoices = array_merge($uploadedInvo,$invoiceold);
            }else{
                $allImagInvoices = $uploadedInvo;
            }
            // dd($allImages);
            $project_Invoice = implode('|', $allImagInvoices);
            if($uploadedInvo == 'false'){
                return back()->withInput();
            }else{
                $flats->invoice_attachments       = $project_Invoice;
            }
            $flats->save();


            $new = Invoice::where('maintenance_id',$id)->first();
            if ($new){

                $new->unit_id             =$request->input('unit_id');
                $new->flat_id             =$request->input('flat_id');
                $new->manger_id           =$unit->user_id;
                $new->owner_id            =$unit->owner_id;
                $new->date               =$request->input('start_date');
                $new->amount             =$request->input('amount');
                $new->details             =$request->input('details');
                $new->image               =$flats->invoice_attachments;
                $new->save();

            }


            session()->flash('success', trans('orbscope.success'));
            return redirect(AdminPath() . '/orders/' . $flats->id);
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
        $contrat = Order::find($id);
        $invoice=Invoice::where('maintenance_id',$id)->first();
        if ($invoice != null){

            $invoice->delete();
        }
        $contrat->delete();
        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect(AdminPath() . '/orders');
    }





}
