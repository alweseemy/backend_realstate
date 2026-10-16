<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order_type;
use Illuminate\Http\Request;

use Validator;
use App\Http\DataTables\ShopDataTable;

use Illuminate\Http\File;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\UploadFiles as Upload;
use Session;
use Form;

class ShopController extends Controller
{

    public function index(ShopDataTable $dataTable) {
        return $dataTable->render('admin.shop.index',['title' => trans('orbscope.show-all').' '.trans('orbscope.maintenance_types')]);
    }

    public function create() {
        return view('admin.shop.create',['title'=> trans('orbscope.add').' '.trans('orbscope.maintenance_type')]);
    }

    public function store(Request $request) {
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
            $shop = new Order_type();
            $shop->name           = $request->input('ar_name');
            $shop->status         = $request->input('status');


            $shop->save();

            session()->flash('success',trans('orbscope.success'));
            return redirect()->back();

        }
    }



    public function edit($id) {
        $shop = Order_type::find($id);
        return view('admin.shop.edit',['edit'=>$shop,'title'=>trans('orbscope.edit').' '.trans('orbscope.maintenance_type').' : '.$shop->name ]);
    }

    public function update(Request $request, $id) {
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
            $shop = Order_type::find($id);
            $shop->name           = $request->input('ar_name');
            $shop->status         = $request->input('status');
            $shop->save();
            session()->flash('success',trans('orbscope.success'));
            return redirect()->back();

        }
    }

    public function destroy($id) {
        $shop = Order_type::find($id);
        @unlink('uploads/'.$shop->image);
        $shop->delete();
        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect(AdminPath() . '/order_type');
    }

    public function multi_delete(Request $request) {
        $data = $request->input('selected_data');
        if(is_array($data)){
            foreach ($data as $record){
                $shop   = Order_type::find($record);
            }
            Order_type::destroy($data);
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/order_type');
        }
        else {
            $shop = Order_type::find($data);
            $shop->delete();
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/order_type');
        }
    }







}
