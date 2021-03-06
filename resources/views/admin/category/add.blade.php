@extends('layouts.admin')
@section('title','新增分类')
@section('content')

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{route('admin_info')}}">首页</a> &raquo;  分类管理
        <div style="width: 20px;display: inline-block;"></div><i class="fa fa-recycle"></i></i><a href="{{route('admin.category.create')}}">刷新</a>

    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>新增分类</h3>
            @include('errors.errors')

        </div>
        <div class="result_content">
            @include('admin.category.category_nav')
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        {!! Form::open(['route'=>'admin.category.store','method'=>'POST']) !!}
        {{--<form action="{{route('admin.category.store')}}" method="post">--}}
            {{--{{csrf_field()}}--}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>父级分类：</th>
                        <td>
                            <select name="parent_id">
                                <option value="0">==顶级分类==</option>
                                @foreach($parent_categories as $p)
                                    <option value="{{$p->id}}">{{$p->name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require">*</i>分类名称：</th></th>
                        <td>
                            <input type="text" name="name" value="{{old('name')}}">
                            <span><i class="fa fa-exclamation-circle yellow"></i>分类名称必须填写</span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require"></i>分类标题：</th>
                        <td>
                            <input type="text" class="lg" name="title"  value="{{old('title')}}">
                        </td>
                    </tr>

                    {{--<tr>--}}
                        {{--<th><i class="require">*</i>缩略图：</th>--}}
                        {{--<td><input type="file" name=""></td>--}}
                    {{--</tr>--}}
                    <tr>
                        <th>关键词：</th>
                        <td>
                            <textarea name="keywords" ></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>描述：</th>
                        <td>
                            <textarea class="lg" name="desc"  ></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>排序</th>
                        <td>
                            <input type="text" class="sm" name="order_by"  value="{{old('order_by')}}">
                        </td>
                    </tr>

                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        {!! Form::close() !!}
    </div>

@endsection