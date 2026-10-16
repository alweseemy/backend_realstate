<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Service_contract;
use Validator;
use Illuminate\Http\Request;

use Illuminate\Http\File;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\UploadFiles as Upload;
use Session;


class ServiceContractsController extends Controller
{

    
    public function index(service_contractsDataTable $dataTable)
    {
        return $dataTable->render('admin.service_contracts.index',['title' => trans('orbscope.show-all').' '.trans('orbscope.service_contracts')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       ;
        return view('admin.service_contracts.create',['title'=> trans('orbscope.add').' '.trans('orbscope.service_contracts')]);
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
            'unit_id'    => 'required',
            'company_name'    => 'required',

        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'unit_id'  =>trans('orbscope.unit'),
            'company_name'  =>trans('orbscope.company'),

        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {

            if (count($request->unit_id)>0){
               foreach ($request->unit_id as $k=>$v){

                   $city = new Service_contract();
                   $city->unit_id           = $request->input('unit_id')[$k];
                   $city->company_name         = $request->input('company_name');
                   $city->amount         = $request->input('amount');
                   $city->service_type         = $request->input('service_type');
                   $city->start_date         = $request->input('start_date');
                   $city->end_date         = $request->input('end_date');
                   $city->save();
               }
            }else{
                $city = new Service_contract();
                $city->unit_id           = $request->input('unit_id')[0];
                $city->company_name         = $request->input('company_name');
                $city->amount         = $request->input('amount');
                $city->service_type         = $request->input('service_type');
                $city->start_date         = $request->input('start_date');
                $city->end_date         = $request->input('end_date');
                $city->save();

            }



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
        $service_contracts = Service_contract::find($id);
        return view('admin.service_contracts.edit',['edit'=>$service_contracts,'title'=>trans('orbscope.edit').' '.trans('orbscope.service_contracts').' : '.$service_contracts->company_name ]);
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
            'unit_id'    => 'required',
            'company_name'    => 'required',


        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'unit_id'  =>trans('orbscope.unit'),
            'company_name'  =>trans('orbscope.company'),


        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $city = Service_contract::find($id);


            $city->unit_id           = $request->input('unit_id');
            $city->company_name         = $request->input('company_name');
            $city->amount         = $request->input('amount');
            $city->service_type         = $request->input('service_type');
            $city->start_date         = $request->input('start_date');
            $city->end_date         = $request->input('end_date');
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
        $service_contracts = Service_contract::find($id);
        $service_contracts->delete();

        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect()->back();
    }


    public function multi_delete(Request $request)
    {
        $data = $request->input('selected_data');
        if(is_array($data)){

            foreach ($data as $record){
                $service_contracts = City::find($record);

            }
            City::destroy($data);
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/service_contracts');
        }
        else {
            $service_contracts = City::find($data);
            $service_contracts->delete();
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/service_contracts');
        }
    }









}
