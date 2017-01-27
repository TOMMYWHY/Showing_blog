<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Image;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
class CommonController extends Controller
{
    public function upload_image(Request $request)
    {
        $file=$request->file('Filedata');
//        dd($file);

        if($file->isValid()){
            $entension=$file->getClientOriginalExtension();
            $newName=date('Ymdhis').mt_rand(100,999).'.'.$entension;
            $path=$file->move(public_path().'/resources/uploads',$newName);
            $filePath= '/resources/uploads/'.$newName;

//           $re= Image::create([
//                'img_href'=>$filePath,
//            ]);
//           dd($re);
            return $filePath;

        }
    }
}
