<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\DataTables\UnitTypesDataTable;
use App\Models\UnitType;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Excel;
use Alert;
use Session;
use Lang;

class UnitTypesController extends Controller
{



    public function index(UnitTypesDataTable $dataTable)
    {
        return $dataTable->render('admin.unitTypes.index',['title' => trans('orbscope.show-all').' '.trans('orbscope.unitTypes')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.unitTypes.create',['title'=> trans('orbscope.add').' '.trans('orbscope.unitTypes')]);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
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
            $unitTypes = new UnitType();
            $unitTypes->name           = $request->input('ar_name');
            $unitTypes->save();


            session()->flash('success',trans('orbscope.added-message'));
            return redirect()->back();

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
        $unitTypes = UnitType::find($id);
        return view('admin.unitTypes.show',['show'=>$unitTypes,'title'=>trans('orbscope.show').' '.trans('orbscope.unitTypes').' : '.$unitTypes->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unitTypes = UnitType::find($id);
        return view('admin.unitTypes.edit',['edit'=>$unitTypes,'title'=>trans('orbscope.edit').' '.trans('orbscope.unitTypes').' : '.$unitTypes->name ]);
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
            'ar_name'=>'required',

        ];

        $Validator = Validator::make($request->all(),$rules);

        $Validator->SetAttributeNames([
            'ar_name'=>trans('orbscope.ar-name'),

        ]);

        if($Validator->fails())
        {
            return back()->withInput()->withErrors($Validator);
        }else{
            $unitTypes = UnitType::find($id);;
            $unitTypes->name       = $request->input('ar_name');
            $unitTypes->save();
            session()->flash('success',trans('orbscope.updated'));
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
        $unitTypes = UnitType::find($id);
        $unitTypes->delete();
        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect(AdminPath() . '/unitTypes');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Multi Delete
     */
    public function multi_delete(Request $request)
    {
        $data = $request->input('selected_data');
        if(is_array($data)){
            UnitType::destroy($data);
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/unitTypes');
        }
        else {
            $unitTypes = UnitType::find($data);
            $unitTypes->delete();
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/unitTypes');
        }
    }



}
