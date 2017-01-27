@extends('layouts.admin')
        @section('title','修改密码')
        @section('content')
    <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{route('admin_info')}}">首页</a> &raquo; 修改密码
    <div style="width: 20px;display: inline-block;"></div><i class="fa fa-recycle"></i></i><a href="{{route('admin_change_password')}}">刷新</a>
</div>
<!--面包屑导航 结束-->
<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>修改密码</h3>
        @include('errors.errors')
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    {!! Form::open([
    'route'=>'admin_change_password',
    'method'=>'POST'
    ]) !!}
        <table class="add_tab">
            <tbody>
            <tr>
                <th width="120"><i class="require">*</i>原密码：</th>
                <td>
                    {!! Form::password('password_o',[]) !!}
                    </span>请输入原始密码</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>新密码：</th>
                <td>
                    {!! Form::password('password',[]) !!}
                    </span>新密码6-20位</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>确认密码：</th>
                <td>
                    {!! Form::password('password_confirmation',[]) !!}
                    </span>再次输入密码</span>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    {!! Form::submit('提交') !!}
                    <input type="button" class="back" onclick="history.go(-1)" value="返回">
                </td>
            </tr>
            </tbody>
        </table>
    {!! Form::close() !!}
</div>

        @endsection