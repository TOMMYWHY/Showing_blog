@extends('layouts.admin')
@section('title','编辑分类')
@section('content')

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{route('admin_info')}}">首页</a> &raquo;  分类管理
        {{--<div style="width: 20px;display: inline-block;"></div><i class="fa fa-recycle"></i></i><a href="{{route('admin.category.index')}}">刷新</a>--}}

    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>编辑分类</h3>
            @include('errors.errors')

        </div>
        <div class="result_content">
            @include('admin.category.category_nav')
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        {!! Form::model($category,['route'=>['admin.category.update',$category->id],'method'=>'PATCH']) !!}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>父级分类：</th>
                        <td>
                            <select name="parent_id">
                                <option value="0">==顶级分类==</option>
                                @foreach($parent_categories as $p)
                                    <option value="{{$p->id}}" @if($p->id==$category->parent_id) selected @endif >{{$p->name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require">*</i>分类名称：</th></th>
                        <td>
                            {!! Form::text('name',null,[]) !!}
                            <span><i class="fa fa-exclamation-circle yellow"></i>分类名称必须填写</span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require"></i>分类标题：</th>
                        <td>
                            {!! Form::text('title',null,['class'=>'lg']) !!}
                        </td>
                    </tr>
                    <tr>
                        <th>关键词：</th>
                        <td>
                            {!! Form::textarea('keywords',null,['class'=>'']) !!}
                        </td>
                    </tr>
                    <tr>
                        <th>描述：</th>
                        <td>
                            {!! Form::textarea('desc',null,['class'=>'lg']) !!}
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>排序</th>
                        <td>
                            {!! Form::text('order_by',null,['class'=>'sm']) !!}
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
        {{--</form>--}}
        {!! Form::close() !!}
    </div>

@endsection