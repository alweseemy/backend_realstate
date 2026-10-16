<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Invoicetype;
use Validator;
use Illuminate\Http\Request;
use App\Http\DataTables\InvoiceTypeDataTable;
use Illuminate\Http\File;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\UploadFiles as Upload;
use Session;


class InvoiceTypeController extends Controller
{

    
    public function index(InvoiceTypeDataTable $dataTable)
    {
        return $dataTable->render('admin.invoicetype.index',['title' => trans('orbscope.show-all').' '.trans('orbscope.invoice_types')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       ;
        return view('admin.invoicetype.create',['title'=> trans('orbscope.add').' '.trans('orbscope.invoice_type')]);
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
            'type'    => 'required',

        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'ar_name'  =>trans('orbscope.name'),
            'type'  =>trans('orbscope.type'),

        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $city = new Invoicetype();


            $city->name           = $request->input('ar_name');
            $city->type           = $request->input('type');

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
        $invoicetype = Invoicetype::find($id);
        return view('admin.invoicetype.edit',['edit'=>$invoicetype,'title'=>trans('orbscope.edit').' '.trans('orbscope.invoice_type').' : '.$invoicetype->name ]);
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
            'type'    => 'required',

        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'ar_name'  =>trans('orbscope.name'),
            'type'  =>trans('orbscope.type'),

        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $city = Invoicetype::find($id);


            $city->name           = $request->input('ar_name');
            $city->type           = $request->input('type');
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
        if ($id==1 || $id==2 ){

            return redirect()->back()->withErrors(['msg'=>'لا يمكن حذف العملية']);
        }
        $invoicetype = Invoicetype::find($id);
        $invoicetype->delete();

        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect(AdminPath() . '/invoicetype');
    }











}
