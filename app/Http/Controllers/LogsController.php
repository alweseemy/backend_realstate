<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Contract;
use App\Models\Flat;
use App\Models\Invoice;
use App\Models\Log;
use App\Models\Order;
use App\Models\Setting;
use App\Models\ContactUs;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\UploadFiles as Upload;
use Illuminate\Support\Facades\Mail;
use Validator;
use File;

class LogsController extends Controller
{
    /**
     * @param LogsDataTable $dataTable
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(LogsDataTable $dataTable)
    {
        return $dataTable->render('admin.logs.index',['title' =>trans('log.logs')]);
    }

    public function team(){

        return view('admin.team', [
            'title' => 'Team Page',

        ]);

    }

    public function trached(){


        return view('admin.settings.trached');
    }

    public function delete_trach($type,$id){
        if ($type=='invoice'){
            Invoice::where('id', $id)->forceDelete();
            session()->flash('success', trans('orbscope.success'));
            return redirect()->back();

        }elseif ($type=='contract'){
            Contract::where('id', $id)->forceDelete();
            session()->flash('success', trans('orbscope.success'));
            return redirect()->back();

        }elseif ($type=='orders'){

            Order::where('id', $id)->forceDelete();
            session()->flash('success', trans('orbscope.success'));
            return redirect()->back();
        }elseif ($type=='unit'){

            Unit::where('id', $id)->forceDelete();
            session()->flash('success', trans('orbscope.success'));
            return redirect()->back();

        }elseif ($type=='customer'){

            User::where('id', $id)->forceDelete();
            session()->flash('success', trans('orbscope.success'));
            return redirect()->back();

        } elseif ($type=='flat'){

            Flat::where('id', $id)->forceDelete();
            session()->flash('success', trans('orbscope.success'));
            return redirect()->back();

        }else{

            return redirect()->back();
        }

    }

    public function restore_trach($type,$id){

        if ($type=='invoice'){
            Invoice::where('id', $id)->restore();
            session()->flash('success', trans('orbscope.success'));
            return redirect()->back();

        }elseif ($type=='contract'){

            Contract::where('id', $id)->restore();
            session()->flash('success', trans('orbscope.success'));
            return redirect()->back();
        }elseif ($type=='orders'){
            Order::where('id', $id)->restore();
            session()->flash('success', trans('orbscope.success'));
            return redirect()->back();

        }elseif ($type=='unit'){

            Unit::where('id', $id)->restore();
            session()->flash('success', trans('orbscope.success'));
            return redirect()->back();

        }elseif ($type=='customer'){

            User::where('id', $id)->restore();
            session()->flash('success', trans('orbscope.success'));
            return redirect()->back();

        }elseif ($type=='flat'){

            Flat::where('id', $id)->restore();
            session()->flash('success', trans('orbscope.success'));
            return redirect()->back();

        }else{

            return redirect()->back();
        }

    }


    public function send_emails(Request $request){

        $rules = [
            'users' => 'required',
            'title'        => 'required',
            'message'        => 'required',

        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'title'             =>trans('orbscope.title'),
            'message'             =>trans('orbscope.name'),
            'users'             =>trans('orbscope.users'),
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }


        if ($request->users=='users'){

            $users=User::where('type','user')->pluck('email')->toarray();


        }elseif ($request->users=='all'){
            $users=User::pluck('email')->toarray();
        }elseif ($request->users=='teacher'){
            $users=User::where('status','active')->where('type','teacher')->pluck('email')->toarray();
        }else{
            $users=User::where('type','user')->where('payment','paid')->pluck('email')->toarray();
        }



        if (empty($users) && count($users)==0){

            return redirect()->back();

        }


        $emails=$users;

        $mesage=$request->message;

        Mail::send('emails.welcome', compact('mesage'), function($message) use ($emails)
        {
            $message->to($emails)->subject(request('title'));
         });

        session()->flash('success', trans('orbscope.success'));
        return redirect()->back();

    }

    // Create Save Log
    public static function SaveLog($data=[])
    {
        $log = new Log;
        foreach($data as $key => $value)
        {
            $log->$key = $value;
        }
        $log->user_id = auth()->user()->id;
        $log->save();
    }


    public function destroy($id)
    {
        $leadSource = Log::find($id);
        $leadSource->delete();
        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect(AdminPath() . '/logs');
    }


    public function store_pass(Request $request){
        $id=auth()->user()->id;
        $rules = [
            'name' => 'required',
            'email'        => 'required|unique:users,email,'.$id.',id',

        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'name'             =>trans('orbscope.name'),
            'email'             =>trans('orbscope.name'),
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }else{
            $user=User::find(auth()->user()->id);
            $user ->name =$request->name;
            $user ->email =$request->email;
            $user ->phone =$request->phone;
            if(!empty($request->password) && $request->password != '' ){

                $user->password = bcrypt($request->password);
            }
            $user->save();
            session()->flash('success', trans('orbscope.success'));
            return redirect()->back();

        }
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
            Log::destroy($data);
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/logs');
        }
        else {
            $leadSource = Log::find($data);
            $leadSource->delete();
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/logs');
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
        $Log = Log::find($id);
        return view('admin.logs.show',['show'=>$Log,'title'=>trans('orbscope.show').' '.trans('orbscope.logs').' : '.VarByLang($Log->action,GetLanguage())]);
    }



    public function settings_show()
    {
        return view('admin.settings.show', [
            'title' => trans('log.settings'),
            'show'  => Setting::orderBy('id','desc')->first(),
        ]);
    }

    public function form_order(){


        return view('admin.settings.form', [
            'title' => trans('orbscope.form'),
            'show'  => Form_Detail::orderBy('id','desc')->first(),
        ]);
    }



    public function settings_update(Request $request) {

        $rules = [

            'en_name' => 'required',


        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([

            'en_name'             =>trans('orbscope.en-name'),
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $setting = Setting::orderBy('id','desc')->first();

        $setting->name   =  $request->input('en_name');
        $setting->email  =  $request->email;
        $setting->phone  =  $request->phone;
        $setting->sender_name =  $request->sender_name;
        $setting->color  =  $request->color;
        //$setting->percentage  =  $request->percentage;
        $setting->login_color    =  $request->login_color;
        $setting->description  =  $request->input('ar_description');


        if($request->hasFile('logo')){
            $image        = $request->file('logo');
            $uploaded     = Upload::uploadImages('images', $image,'checkImages');
            if($uploaded == 'false'){
                return back()->withInput();
            }else{
                @unlink('uploads/'.$setting->logo);
                $setting->logo           = $uploaded;
            }
        }
        if($request->hasFile('icon_image')){
            $icon            = $request->file('icon_image');
            $upload_icon     = Upload::uploadImages('images', $icon,'checkImages');
            if($upload_icon == 'false'){
                return back()->withInput();
            }else{
                @unlink('uploads/'.$setting->icon);
                $setting->icon           = $upload_icon;
            }
        }

        $keywords     = array('ar'=>$request->input('en_keywords'),'en'=>$request->input('en_keywords'));
        $keywords     = EncodeVar($keywords);
        $setting->keywords =  $keywords;
        $setting->address     = $request->input('en_address');

        $setting->session_timeout =  $request->session_timeout;

        $setting->facebook              = $request->facebook;
        $setting->twitter               = $request->twitter;
        $setting->googleplus              = $request->googleplus;

        $setting->save();
        if ($setting) {
            session()->flash('success',trans('orbscope.success'));
            return redirect(AdminPath().'/settings/');
        }else {
            abort(404);
        }
    }


    public function prices(){

        return view('admin.settings.prices',['title'=>trans('orbscope.prices'),
            'show'  => Setting::orderBy('id','desc')->first(),
            ]);
    }


    public function services_activation(Request $request){
        $setting = Setting::orderBy('id','desc')->first();
        $setting->trans =$request->trans;
        $setting->cv =$request->cv;
        $setting->letter =$request->letter;
        $setting->proof =$request->proof;
        $setting->save();
        if ($setting) {
            session()->flash('success',trans('orbscope.success'));
            return redirect(AdminPath());
        }else {
            abort(404);
        }
    }

    public function contact_messages(ContactMessagesDatatable $dataTable) {

        return $dataTable->render('admin.contact_us.index',['title' =>trans('orbscope.contact-messages')]);
    }



    public function contact_messages_delete($id) {

        $con = ContactUs::find($id);
        if ($con) {
            $con->delete();
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/contact-messages');
        }
        return redirect(AdminPath() . '/contact-messages');
    }

    public function contact_messages_multi_delete(Request $request) {

        $data = $request->input('selected_data');
        if(is_array($data)){
            ContactUs::destroy($data);
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/contact-messages');
        }
        else {
            $con = ContactUs::find($data);
            $con->delete();
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/contact-messages');
        }
    }


    public function profile(){

        return view('admin.profile');
    }


}
