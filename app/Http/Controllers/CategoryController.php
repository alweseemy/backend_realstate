<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

use App\Models\Category;
use Validator;
use App\Http\DataTables\CategoryDataTable;
use Logs;
use Illuminate\Http\File;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\UploadFiles as Upload;
use Session;
use Form;


class CategoryController extends Controller
{

    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.category.index',['title' => trans('orbscope.show-all').' '.trans('orbscope.category')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shop = Shop::where('status','active')->get();
        return view('admin.category.create',['title'=> trans('orbscope.add').' '.trans('orbscope.category'),'shop'=>$shop]);
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
            'shop_id'    =>'required',


        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'ar_name'  =>trans('orbscope.ar-name'),
            'shop_id' =>trans('orbscope.shop'),
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $country = new Category;


            $country->name             = $request->input('ar_name');
            $country->description	   = $request->input('description');
            $country->shop_id	       = $request->input('shop_id');
            $country->status           = $request->input('status');
            $country->show_website     = $request->input('show_website');
            $country->icon             = $request->input('icon');
            $image                     = $request->file('flag');
            $uploaded                  = Upload::uploadImages('category', $image,'checkImages');

            if($uploaded == 'false'){
                return back()->withInput();
            }else{
                $country->image           = $uploaded;
            }
            $country->save();
            Logs::SaveLog(
                [
                    'action' =>LogAction('add',$country->id),
                    'type'   =>'add',
                    'table'  =>'categories',
                    'route'  =>LogRoute('category'),
                    'data'   =>'log.add_record'.' | '.'orbscope.categorys'.' | '.' log.record_number '.' | '.$country->id ,
                ]
            );

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


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Category::find($id);
        $shop= Shop::where('status','active')->get();
        return view('admin.category.edit',['edit'=>$country,'shop'=>$shop,'title'=>trans('orbscope.edit').' '.trans('orbscope.category').' : '.$country->name ]);
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
            'shop_id'    => 'required',

        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'ar_name'  =>trans('orbscope.ar-name'),
            'shop_id'  =>trans('orbscope.shop'),
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $country = Category::find($id);

            $country->name           = $request->input('ar_name');
            $country->description	       = $request->input('description');
            $country->shop_id	       = $request->input('shop_id');
            $country->status         = $request->input('status');
            $country->show_website   = $request->input('show_website');
            $country->icon             = $request->input('icon');
            if ($request->file('flag')) {
                $image                     = $request->file('flag');
                $uploaded                  = Upload::uploadImages('category', $image,'checkImages');

                if($uploaded == 'false'){
                    return back()->withInput();
                }else{
                    @unlink('uploads/'.$country->image);
                    $country->image           = $uploaded;
                }
            }
            $country->save();
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
        $country = Category::find($id);
        @unlink('uploads/'.$country->image);
        $country->delete();
        Logs::SaveLog([
            'action' =>LogAction('delete',$country->id),
            'type'   =>'delete',
            'table'  =>'category',
            'route'  =>LogRoute('category'),
            'data'   =>'log.delete_record'.' | '.'orbscope.category'.' | '.' log.record_number '.' | '.$country->id ,
        ]);
        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect(AdminPath() . '/category');
    }


    public function multi_delete(Request $request)
    {
        $data = $request->input('selected_data');
        if(is_array($data)){
            foreach ($data as $record){
                $country   = Category::find($record);
                @unlink('uploads/'.$country->image);

                Logs::SaveLog([
                    'action' =>LogAction('delete',$record),
                    'type'   =>'delete',
                    'table'  =>'category',
                    'route'  =>LogRoute('category'),
                    'data'   =>'log.delete_record'.' | '.'orbscope.category'.' | '.' log.record_number '.' | '.$record ,
                ]);
            }
            Category::destroy($data);
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/category');
        }
        else {
            $category = Category::find($data);
            @unlink('uploads/'.$category->image);
            $category->delete();
            Logs::SaveLog([
                'action' =>LogAction('delete',$data),
                'type'   =>'delete',
                'table'  =>'category',
                'route'  =>LogRoute('category'),
                'data'   =>'log.delete_record'.' | '.'orbscope.category'.' | '.' log.record_number '.' | '.$data ,
            ]);
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/category');
        }
    }


    /**
     * Upload Excel File
     */


    public function get_Subcategory($id,CategorySub $dataTable){
        $leads       = Category::find($id);
        return $dataTable->LeadID($id)->render('admin.category.requests',['title'=>trans('orbscope.show').' '.trans('orbscope.category').' : '.VarByLang($leads->name,GetLanguage()),'show'=>$leads]);

    }
    public function get_product($id,CategoryProduct $dataTable){
        $leads       = Category::find($id);
        return $dataTable->LeadID($id)->render('admin.category.requests',['title'=>trans('orbscope.show').' '.trans('orbscope.category').' : '.VarByLang($leads->name,GetLanguage()),'show'=>$leads]);

    }



}
