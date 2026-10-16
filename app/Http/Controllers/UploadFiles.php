<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Intervention\Image\Image;

class UploadFiles extends Controller
{

    public static function uploadImages($dir,$image,$checkFunction,$watermark = null){


        $saveImage = '';
        // Check Dir Name (Create is not exist)
        if(!file_exists(base_path('/public/uploads').'/'.$dir))
        {
           //dd(base_path('public'));
            mkdir(base_path('/public/uploads').'/'.$dir);
        }
        if(is_file($image)){
            $name = getOriginalName($image);
            if(!$checkFunction($name)){
                return false;
            }else{
                $imageName     = rand(0000,9999).time();
                $ext           = $image->getClientOriginalExtension();
                $fileName      = $imageName.'.'.$ext;
                if($watermark == 'true' ){
                    $image = Image::make($image->getRealPath());
                    $image->save(base_path('/public/uploads/'.$dir.'/'.$fileName),'100');
                }else{
                    $image->move(base_path('/public/uploads').'/'.$dir,$fileName);
                }
                $saveImage = $dir.'/'.$fileName;


            }
        }
        return $saveImage;
    }
}