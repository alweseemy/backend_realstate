<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\DataTables\HoodDataTable;

use App\Imports\HoodImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Hood;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\UploadFiles as Upload;
use Session;


class HoodController extends Controller
{

    
    public function index(HoodDataTable $dataTable)
    {
        return $dataTable->render('admin.hoods.index',['title' => trans('orbscope.show-all').' '.trans('orbscope.hoods')]);
    }

    public function hood_ajax(Request $request){

        $hoods=Hood::where('city_id',$request->city_id)->get();
        $hood_id           = $request->old('hood_id');

        return view('admin.hoods.ajax',compact('hoods','hood_id'));


    }


    public function uploadexcel(){

        return view('admin.hoods.upload',['title'=>trans('orbscope.upload').' '.trans('orbscope.customers')]);

    }

    public function upload_hoods(Request $request){

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
                $array = Excel::import(new HoodImport(), $path, null, \Maatwebsite\Excel\Excel::CSV);

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       ;
        return view('admin.hoods.create',['title'=> trans('orbscope.add').' '.trans('orbscope.hoods')]);
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

        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'ar_name'  =>trans('orbscope.ar-name'),

        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $city = new Hood();


            $city->name           = $request->input('ar_name');
            $city->city_id         = $request->input('city_id');

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
        $hoods = Hood::find($id);
        return view('admin.hoods.edit',['edit'=>$hoods,'title'=>trans('orbscope.edit').' '.trans('orbscope.hoods').' : '.$hoods->name ]);
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


        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'ar_name'  =>trans('orbscope.ar-name'),


        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $city = Hood::find($id);


            $city->name           = $request->input('ar_name');
            $city->city_id         = $request->input('city_id');
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
        $hoods = Hood::find($id);
        $hoods->delete();

        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect(AdminPath() . '/hoods');
    }


    public function multi_delete(Request $request)
    {
        $data = $request->input('selected_data');
        if(is_array($data)){

            foreach ($data as $record){
                $hoods = City::find($record);

            }
            Hood::destroy($data);
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/hoods');
        }
        else {
            $hoods = Hood::find($data);
            $hoods->delete();
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/hoods');
        }
    }









}
