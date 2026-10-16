<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;


use App\Http\DataTables\PaymentsDataTable;


use App\Http\DataTables\TransferDataTable;
use App\Models\OwnerBankAccount;
use App\Models\Transfer;
use App\Models\Unit;
use Illuminate\Validation\Rules\In;
use Validator;
use App\Http\Controllers\UploadFiles as Upload;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Intervention\Image\ImageManager;


use Session;

class TransferController extends Controller
{


    public function index(TransferDataTable $dataTable)
    {
        return $dataTable->render('admin.money_transfers.index',['title' => trans('orbscope.show-all').' '.trans('orbscope.transfers')]);
    }

    public function money_transfers_ajax(Request $request){
         $unit=Unit::find($request->unit);
         $accounts=OwnerBankAccount::where('owner_id',$unit->owner_id)->get();

        return view('admin.money_transfers.ajax',compact('accounts'));
    }



    public function create()
    {

            $shop = Unit::all();


        return view('admin.money_transfers.create',['title'=> trans('orbscope.add').' '.trans('orbscope.money_transfers'),'units'=>$shop]);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
       // dd($request->all());


            $rules = [
                'unit_id'      => 'required',
                'owner_account_id'      => 'required',
                'date'   => 'required',
                'amount'     => 'required',

            ];
            $validator = Validator::make($request->all(),$rules);
            $validator->SetAttributeNames([
                'unit_id'    =>trans('orbsope.unit'),
                'owner_account_id'    =>trans('orbscope.bank_account'),
                'date'    =>trans('orbscope.date'),
                'amount'    =>trans('orbscope.amount_money'),
            ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {

            $trans        = new Transfer();
            $unit=Unit::find($request->unit_id);
            $trans->unit_id  =$request->unit_id;
            $trans->owner_id  =$unit->owner_id;
            $trans->owner_account_id  =$request->owner_account_id;
            $trans->amount  =$request->amount;
            $trans->date  =$request->date;

            $main_image             = $request->file('main_image');
            if(!empty($main_image) && $main_image != ''){
                foreach ($main_image as $img){
                    $uploadedImages[]     = Upload::uploadImages('money_transfers', $img,'allowExtFiles','false');
                }
                if($uploadedImages == 'false'){
                    return back()->withInput();
                }else{
                    $tcl = implode('|', $uploadedImages);
                    $trans->images       = $tcl;
                }
            }
            $trans->save();
            //dd($request->all(),'no');
            session()->flash('success',trans('orbscope.success'));
            return redirect(AdminPath() . '/money_transfers/'.$trans->id);


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
        $flats     = Transfer::find($id);
        return view('admin.money_transfers.show',['show'=>$flats,'title'=>trans('orbscope.show').' '.trans('orbscope.transfer')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flat         = Transfer::find($id);

            $shop = Unit::all();
            $accounts=OwnerBankAccount::where('owner_id',$flat->owner_id)->get();


        return view('admin.money_transfers.edit',['edit'=>$flat,'units'=>$shop,'accounts'=>$accounts,
            'title'=>trans('orbscope.edit').' '.trans('orbscope.transfer'),
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
            'owner_account_id'      => 'required',
            'date'   => 'required',
            'amount'     => 'required',

        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'unit_id'    =>trans('orbsope.unit'),
            'owner_account_id'    =>trans('orbscope.bank_account'),
            'date'    =>trans('orbscope.date'),
            'amount'    =>trans('orbscope.amount_money'),
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            //dd($request->all());
            $trans = Transfer::find($id);
            $unit=Unit::find($request->unit_id);
            $trans->unit_id  =$request->unit_id;
            $trans->owner_id  =$unit->owner_id;
            $trans->owner_account_id  =$request->owner_account_id;
            $trans->amount  =$request->amount;
            $trans->date  =$request->date;

            $main_image             = $request->file('main_image');
            if(!empty($main_image) && $main_image != ''){
                foreach ($main_image as $img){
                    $uploadedImages[]     = Upload::uploadImages('money_transferss', $img,'allowExtFiles','false');
                }
                if($uploadedImages == 'false'){
                    return back()->withInput();
                }else{
                    $tcl = implode('|', $uploadedImages);
                    $trans->images       = $tcl;
                }
            }
            $trans->save();
            session()->flash('success', trans('orbscope.success'));
            return redirect(AdminPath() . '/money_transfers/'.$trans->id);
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
        $contrat = Transfer::find($id);
        $contrat->delete();
        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect()->back();
    }





}
