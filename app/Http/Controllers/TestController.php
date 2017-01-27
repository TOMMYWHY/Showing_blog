<?php

namespace App\Http\Controllers;

use App\Http\Model\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

class TestController extends Controller
{
    public function index()
    {
        return view('test/validate');
    }

    public function password_validate(Requests\TestRequest $request)
    {
//        dd($request);
        $old_pass=$request->password_o;
        $new_pass=$request->password;
        $confir_pass=$request->password_confirmation;
        return back()
            ->withErrors($request);
    }

    public function img()
    {
        return view('test/img');
    }
//    public function uploads()
    public function uploads(Request $request)
    {
//        $file = Input::file('imgs');
//        $file = Input::all();
//        dd($file);

//        if(!$request->hasFile()){
//            exit('上传文件为空！');
//            }
//        $file = $request->all();
        $file=$request->file('imgs');
        dd($file);
        if($request->hasFile('Filedata')){
            dd($request->file('Filedata'));
            foreach($request->file('Filedata') as $file) {
//                $file->move(base_path().'/public/uploads/', $file->getClientOriginalName());
//                if($file->isValid()){
                $entension=$file->getClientOriginalExtension();
                $newName=date('Ymdhis').mt_rand(100,999).'.'.$entension;
                $path=$file->move(public_path().'/resources/uploads',$newName);
                $filePath= '/resources/uploads/'.$newName;
                return $filePath;
//                }
            }
        }
    }


    public function relations()
    {
//        return 1;
//        $comment = App\Comment::find(1);
        $article = Article::find(1)->category();
        dd($article);
//        echo $article->category()->name;
    }
}

