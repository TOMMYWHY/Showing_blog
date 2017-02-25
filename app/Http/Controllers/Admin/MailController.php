<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class MailController extends CommonController
{
    //

    public function send()
    {

//        Mail::
        $name = 'sookie';
        $flag = Mail::send('emails.test',['name'=>$name],function($message){
            $to = 'tommywhy1989@gmail.com';
            $message ->to($to)->subject('邮件测试');
        });
        if($flag){
            echo '发送邮件成功，请查收！';
        }else{
            echo '发送邮件失败，请重试！';
        }
    }
}
