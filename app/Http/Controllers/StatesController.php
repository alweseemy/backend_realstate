<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Validator;
use Illuminate\Http\Request;
use App\Http\DataTables\StatesDataTable;
use Logs;
use Illuminate\Http\File;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\UploadFiles as Upload;
use Session;
use Form;


class StatesController extends Controller
{

    /**
     * @param StatesDataTable $dataTable
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */

    public function index(StatesDataTable $dataTable)
    {
        return $dataTable->render('admin.states.index',['title' => trans('orbscope.show-all').' '.trans('orbscope.states')]);
    }

    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function create()
    {
        $Country = Country::where('status','active')->get();
        return view('admin.states.create',['title'=> trans('orbscope.add').' '.trans('orbscope.states'),'country'=>$Country]);
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
            'ar_name'       => 'required',
            'country_id'    => 'required',
            'city_id'       => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'ar_name'     =>trans('orbscope.ar-name'),
            'country_id'  =>trans('orbscope.country'),
            'city_id'     =>trans('orbscope.cities'),
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $states = new State;


            $states->name           = $request->input('ar_name');
            $states->status         = $request->input('status');
            $states->show_website   = $request->input('show_website');
            $states->country_id     = $request->input('country_id');
            $states->city_id        = $request->input('city_id');





            $states->save();
            Logs::SaveLog(
                [
                    'action' =>LogAction('add',$states->id),
                    'type'   =>'add',
                    'table'  =>'states',
                    'route'  =>LogRoute('states'),
                    'data'   =>'log.add_record'.' | '.'orbscope.counties'.' | '.' log.record_number '.' | '.$states->id ,
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
        $states = State::find($id);
        $Country = Country::where('status','active')->get();
        $cities  = City::where('status','active')->where('country_id',$states->country_id)->get();
        return view('admin.states.edit',['edit'=>$states,'title'=>trans('orbscope.edit').' '.trans('orbscope.states').' : '.$states->name,'country' => $Country,'cities'=>$cities]);
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
            'ar_name'          => 'required',
            'country_id'       => 'required',
            'city_id'          => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'ar_name'        =>trans('orbscope.ar-name'),
            'country_id'     =>trans('orbscope.country'),
            'city_id'        =>trans('orbscope.cities'),
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $states = State::find($id);


            $states->name           = $request->input('ar_name');
            $states->status         = $request->input('status');
            $states->show_website   = $request->input('show_website');
            $states->country_id     = $request->input('country_id');
            $states->city_id        = $request->input('city_id');

            $states->save();

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
        $states = State::find($id);
        $states->delete();
        Logs::SaveLog([
            'action' =>LogAction('delete',$states->id),
            'type'   =>'delete',
            'table'  =>'states',
            'route'  =>LogRoute('states'),
            'data'   =>'log.delete_record'.' | '.'orbscope.states'.' | '.' log.record_number '.' | '.$states->id ,
        ]);
        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect(AdminPath() . '/states');
    }


    public function multi_delete(Request $request)
    {
        $data = $request->input('selected_data');
        if(is_array($data)){
            State::destroy($data);
            foreach ($data as $record){
                Logs::SaveLog([
                    'action' =>LogAction('delete',$record),
                    'type'   =>'delete',
                    'table'  =>'states',
                    'route'  =>LogRoute('states'),
                    'data'   =>'log.delete_record'.' | '.'orbscope.states'.' | '.' log.record_number '.' | '.$record ,
                ]);
            }
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/states');
        }
        else {
            $states = State::find($data);
            $states->delete();
            Logs::SaveLog([
                'action' =>LogAction('delete',$data),
                'type'   =>'delete',
                'table'  =>'states',
                'route'  =>LogRoute('states'),
                'data'   =>'log.delete_record'.' | '.'orbscope.states'.' | '.' log.record_number '.' | '.$data ,
            ]);
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/states');
        }
    }





    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function get_cities(Request $request){
        $id                 = $request->input('country_id');
        $city_id            = $request->old('city_id');
        $cities   = City::where('country_id',$id)->where('status','active')->get();
        return view('admin.states.cities',['cities'=>$cities,'city_id'=>$city_id]);
    }






}
