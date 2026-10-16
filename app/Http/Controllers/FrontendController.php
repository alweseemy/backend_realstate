<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Auth;
use Session;
use File;
use Intervention\Image\ImageManager;
use Validator;

class FrontendController extends Controller
{


    public function index(){

        $show=Setting::first();
       return view('front.contact',compact('show'));
    }

























}
