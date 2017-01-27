<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
//use Dotenv\Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;
//use DB;

class IndexController extends CommonController
{
    public function index()
    {
        return view('admin.index');
    }

    public function info()
    {
        return view('admin.info');
    }

    public function logout()
    {
//        session(['user'=>null]);
        session()->forget('user');
        return redirect()->route('admin_login');

    }

    public function change_password()
    {
        if($input=Input::all()){
            $rules=[
                'password'=>'required|between:6,20|confirmed',
            ];
            $message=[
                'password.required'=>'新密码不能为空',
                'password.between'=>'新密码6-20位',
                'password.confirmed'=>'新密码与确认密码不一致',
            ];
            $validator=Validator::make($input,$rules,$message);
            if ($validator->fails()) {
                return redirect()
                    ->route('admin_change_password')
                    ->withErrors($validator)
                    ->withInput();
            }
            else{
                $user=session()->get('user');
//                dd($user_id);
                $user=User::findOrFail($user->id);
                $_password= Crypt::decrypt($user->password);
               if($input['password_o']==$_password){
                   $user->password = Crypt::encrypt($input['password']);
                    $user->update();
//                    return redirect()->route('admin_info');
                   return back()->with('errors','修改成功！');
               }else{
//                    $errors->all();
                   return back()->with('errors','原密码错误！');
               }
            }

        }
        else {
            return view('admin.pass');
        }

    }



}
