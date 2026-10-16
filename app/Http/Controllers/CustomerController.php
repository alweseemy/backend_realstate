<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


use App\Imports\UsersImport;
use App\Models\OwnerBankAccount;
use App\Models\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\DataTables\CustomerDataTable;
use Spatie\Permission\Models\Permission;
use File;
use Intervention\Image\ImageManager;
use App\Http\Controllers\UploadFiles as Upload;
use Session;
use Maatwebsite\Excel\Facades\Excel;


class CustomerController extends Controller
{
    //use Authorizable;
    /**
     * @param customerDataTable $dataTable
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(CustomerDataTable $dataTable)
    {
        return $dataTable->render('admin.customer.index',['title' => trans('orbscope.show-all').' '.trans('orbscope.customers')]);
    }

    public function advanced_search(CustomerDataTable $dataTable,Request $request){

       $senders= $request->all();

        return $dataTable->render('admin.customer.index',compact('senders'),['title' => trans('orbscope.show-all').' '.trans('orbscope.customers')]);

    }

    public function add_bankacount(){

        return view('admin.customer.addline_bank');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.customer.create',['title'=> trans('orbscope.add').' '.trans('orbscope.customer')]);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$m=preg_match('/1234|123|56789|567890|2222|1111|3333|5555|7777|8888|0000|9999|4444|234567|67890/', $request->id_number,$result );


        //if(count(array_filter($result)) > 0){
           // return redirect()->back()->withInput()->withErrors(['خطاء', 'يرجي ادخال صيغة صحيحة للرقم الهوية الوطنية']);

        //}

        $rules = [
            'name'         => 'required',
            'type'         => 'required',
            //'id_number'        => 'required',
            'phone'        => 'required',
            //'email'        => 'required|email|unique:users',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'name'       =>trans('orbscope.name'),
            'email'      =>trans('orbscope.email'),
            'type'      =>trans('orbscope.customer_type'),
            'id_number'      =>trans('orbscope.identy_id'),
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
           //dd($request->all());
            $customer                 = new User();
            $customer->name           = $request->input('name');
            $customer->email          = $request->input('email');
            $customer->type           = $request->type;
            $customer->manger_id           = auth()->id();
            //$customer->birth_date           = $request->birth_date;
            $customer->phone           = $request->phone;
            $customer->id_number           = $request->id_number;
            $customer->passport_id           = $request->passport_id;
            $customer->nationality           = $request->nationality;
            $customer->id_expiration_date          = $request->input('id_expiration_date');
            $customer->passport_expiration_date          = $request->input('passport_expiration_date');
            if ($request->id_image != '' && $request->id_image != null) {
                $uploaded_image  = Upload::uploadImages('customers', $request->id_image,'allowExtFiles');
                if($uploaded_image == 'false'){
                    return back()->withInput();
                }else{
                    $customer->id_image = $uploaded_image;
                }
            }
            if ($request->passport_image != '' && $request->passport_image != null) {
                $uploaded_image  = Upload::uploadImages('customers', $request->passport_image,'allowExtFiles');
                if($uploaded_image == 'false'){
                    return back()->withInput();
                }else{
                    $customer->passport_image = $uploaded_image;
                }
            }
            $customer->save();
            //dd($request->all());

            if ($request->bank_account != null){
            foreach ($request->bank_account as $k=>$v){

                $new=new OwnerBankAccount();
                $new->bank_account = $v;
                $new->owner_id =$customer->id;
                $new->bank_id = $request->bank_id[$k];
                $new->save();

            }
            }

            session()->flash('success',trans('orbscope.success'));
            return redirect(AdminPath().'/customer');
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

       $show=User::find($id);

       return view('admin.customer.show',compact('show'),['title'=>trans('orbscope.show').' '.trans('orbscope.customer').' '.$show->name]);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $agent = User::find($id);

        if ($agent) {
            return view('admin.customer.edit',[
                'title'=> trans('orbscope.edit').' '.trans('orbscope.customer'),
                'edit' => $agent,

            ]);
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $customer = User::find($id);
        if ($customer) {
            $rules = [
                'name' => 'required',
                'phone'        => 'required',
                //'email' => 'unique:users,email,' . $id . ',id',

            ];
            $validator = Validator::make($request->all(), $rules);
            $validator->SetAttributeNames([
                'name' => trans('orbscope.name'),
                'phone' => trans('orbscope.phone'),
                'email' => trans('orbscope.email'),
            ]);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            } else {
                $customer->name           = $request->input('name');
                $customer->email          = $request->input('email');
                $customer->type           = $request->type;
                $customer->manger_id           = auth()->id();
                $customer->birth_date           = $request->birth_date;
                $customer->phone           = $request->phone;
                $customer->id_number           = $request->id_number;
                $customer->passport_id           = $request->passport_id;
                $customer->nationality           = $request->nationality;
                $customer->id_expiration_date          = $request->input('id_expiration_date');
                $customer->passport_expiration_date          = $request->input('passport_expiration_date');
                if ($request->id_image != '' && $request->id_image != null) {
                    $uploaded_image  = Upload::uploadImages('customers', $request->id_image,'allowExtFiles');
                    if($uploaded_image == 'false'){
                        return back()->withInput();
                    }else{
                        $customer->id_image = $uploaded_image;
                    }
                }
                if ($request->passport_image != '' && $request->passport_image != null) {
                    $uploaded_image  = Upload::uploadImages('customers', $request->passport_image,'allowExtFiles');
                    if($uploaded_image == 'false'){
                        return back()->withInput();
                    }else{
                        $customer->passport_image = $uploaded_image;
                    }
                }
                $customer->save();

                if ($customer && $request->count_number != null) {
                    for ($i=0; $i < count($request->count_number); $i++) {
                        try {
                            $pro_Purchasesinvoice = OwnerBankAccount::find($request->main_id[$i]);
                            if (!$pro_Purchasesinvoice) {
                                $pro_Purchasesinvoice = new OwnerBankAccount();
                            }
                            $pro_Purchasesinvoice->owner_id =$customer->id;
                            $pro_Purchasesinvoice->bank_id = $request->bank_id[$i];
                            $pro_Purchasesinvoice->bank_account = $request->bank_account[$i];
                            $pro_Purchasesinvoice->save();
                        } catch (Exception $e) { }
                    }
                }

                session()->flash('success',trans('orbscope.success'));
                return redirect()->back();
            }
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $customer = User::find($id);
        $customer->delete();

        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect(AdminPath() . '/customer');
    }


    public function multi_delete(Request $request) {
        $data = $request->input('selected_data');
        if(is_array($data)){


            User::destroy($data);
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/customer');
        }
        else {
            $customer = User::find($data);
            $customer->delete();

            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/customer');
        }
    }




    public function download_cv($id){

        $file_path = public_path('uploads').'/cv_editor/'.$id;
        return response()->download($file_path);
    }


    public function upload_customer(){

        return view('admin.customer.upload',['title'=>trans('orbscope.upload').' '.trans('orbscope.customers')]);

    }

    public function upload_users(Request $request){


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
                $array = Excel::import(new UsersImport(), $path, null, \Maatwebsite\Excel\Excel::CSV);

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




}
