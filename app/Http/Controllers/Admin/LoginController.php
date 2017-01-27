<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;

//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
//use Redirect;

require_once 'resources/org/code/Code.class.php';
class LoginController extends CommonController
{

    public function login(Request $request)
    {
        if($request->all()){
            $code=new \Code();//实例一个验证码对象
            $sys_code=$code->get();//获取系统生成的验证码
            $user_code=strtoupper($request->code);//将用户输入的验证码转为大写
            if($user_code!=$sys_code){
                return back()->with('msg','验证码错误~!');
                return redirect('admin/login')->withInput();
            }
            $user=User::where('username',$request->username)->first();
//            dd($user);

            $decrypt_password=decrypt($user->password);
//            dd($decrypt_password);
            if($user->username!=$request->username||
                $decrypt_password!=$request->password){
                return back()->with('msg','用户名或密码错误~!');
            }
            session()->put('user',$user);
            return redirect()->route('admin_index');
        }else{
            return view('admin.login');
        }
    }



    public function crypt()
    {
        $str='123456';
        $str1='eyJpdiI6ImRZSDZXV0tISjBGc0VaN3lZcGlGcXc9PSIsInZhbHVlIjoiQ3dudjBUM3dQNG9jZHFTOEp2NDlLUT09IiwibWFjIjoiOTUzZWU5YzdmZDE0NDRhN2Y4ZjIxN2E2M2UzZTQ3OGYxN2JhYmI3ZmU0M2EwNjYwMTAwNGE5ZWE4NGEwYTZjYSJ9';
        $jiami=Crypt::encrypt($str);
        echo $jiami;
        echo '<br>';
        $jiemi=decrypt($str1);
        echo $jiemi;
    }

    public function code()
    {
        $code=new \Code();
//        echo $code->make();
        return $code->make();
    }
    public function getcode()
    {
        $code=new \Code();
        echo $code->get();
    }
}
