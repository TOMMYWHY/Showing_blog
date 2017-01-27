<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TestRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'password'=>'required|between:6,20|confirmed',
            'password_o'=>'required',
        ];
    }
    public function messages()
    {
        return[
            'password.required'=>'新密码不能为空',
            'password.between'=>'新密码6-20位',
            'password.confirmed'=>'新密码与确认密码不一致',
        ];

    }
}
