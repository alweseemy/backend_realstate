<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Validator;
use Illuminate\Http\Request;
use App\DataTables\PagesDataTable;
use Logs;
use Illuminate\Http\File;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\UploadFiles as Upload;
use App\Authorizable;
use Session;

class PagesController extends Controller
{


    public function index(PagesDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.index',['title' => trans('orbscope.show-all').' '.trans('orbscope.pages')]);
    }


    public function create()
    {
        return view('admin.pages.create',['title'=> trans('orbscope.add').' '.trans('orbscope.pages')]);
    }


    public function store(Request $request)
    {
        $rules = [
            'en_name'           => 'required',
            'en_details'        => 'required',
            'en_description'    => 'required',
            'status'            => 'required|in:active,inactive',
            'show_website'      => 'required|in:show,hide',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([
            'en_name'   =>trans('orbscope.en-name'),
            'en_details'  =>trans('orbscope.en-details'),
            'en_description'  =>trans('orbscope.en-description'),
            'status'        =>trans('orbscope.status'),
            'show_website'  =>trans('orbscope.show_website'),
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $page = new Page();
            $page->name           = $request->input('en_name');
            $page->details        = $request->input('en_details');
            $page->description    = $request->input('en_description');

            $page->status         = $request->input('status');

            $page->show_website   = $request->input('show_website');
            if ($request->input('show_website') == 'show') {
                $page->url     = $request->input('url');
            }else {
                $page->url     = null;
            }

            // dd("Wedwed");
            $page->save();

            session()->flash('success',trans('orbscope.success'));
            return redirect(AdminPath().'/pages/'.$page->id);

        }
    }


    public function show($id)
    {
        $page = Page::find($id);
        if ($page) {
            return view('admin.pages.show',['show'=>$page,'title'=>trans('orbscope.show').' '.trans('orbscope.page').' : '.$page->name]);
        }
        return redirect(AdminPath());
    }


    public function edit($id)
    {
        $page = Page::find($id);
        if ($page) {
            return view('admin.pages.edit',['edit'=>$page,'title'=>trans('orbscope.edit').' '.trans('orbscope.page').' : '.$page->name ]);
        }
        return redirect(AdminPath());
    }



    public function update(Request $request, $id)
    {
        $rules = [

            'en_name'           => 'required',

            'en_details'        => 'required',

            'en_description'    => 'required',
            'status'            => 'required|in:active,inactive',
            'show_website'      => 'required|in:show,hide',
        ];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames([

            'en_name'   =>trans('orbscope.en-name'),

            'en_details'  =>trans('orbscope.en-details'),

            'en_description'  =>trans('orbscope.en-description'),
            'status'        =>trans('orbscope.status'),
            'show_website'  =>trans('orbscope.show_website'),
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $page = Page::find($id);
            if (!$page) {
                return back()->withInput();
            }
            $page->name           = $request->input('en_name');
            $page->details        = $request->input('en_details');
            $page->description    = $request->input('en_description');
            $page->status         = $request->input('status');
            $page->show_website   = $request->input('show_website');
            if ($request->input('show_website') == 'show') {
                $page->url     = $request->input('url');
            }else {
                $page->url     = null;
            }

            $page->save();

            session()->flash('success',trans('orbscope.success'));
            return redirect()->back();

        }
    }



    public function destroy($id)
    {
        $pages = Page::find($id);
        $pages->delete();

        session()->flash('success', trans('orbscope.deleted-message'));
        return redirect(AdminPath() . '/pages');
    }


    public function multi_delete(Request $request)
    {
        $data = $request->input('selected_data');
        if(is_array($data)){
            Page::destroy($data);
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/pages');
        } else {
            $pages = Page::find($data);
            $pages->delete();
            session()->flash('success', trans('orbscope.deleted-message'));
            return redirect(AdminPath() . '/pages');
        }
    }


}
