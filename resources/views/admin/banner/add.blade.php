@extends('layouts.admin')
@section('title','新增Banner')
@section('content')

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{route('admin_info')}}">首页</a> &raquo; 链接管理
        <div style="width: 20px;display: inline-block;"></div><i class="fa fa-recycle"></i></i><a href="{{route('admin.banner.create')}}">刷新</a>
    </div>
    <!--面包屑导航 结束-->
	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>新增Banner</h3>
            @include('errors.errors')

        </div>
        <div class="result_content">
            @include('admin.banner.banner_nav')
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        {{--<form action="{{route('admin.banner.store')}}" method="post">--}}
        {!! Form::open(['route'=>'admin.banner.store','method'=>'POST','files'=>'true']) !!}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require"></i>Banner名称：</th></th>
                        <td>
                            <input type="text" name="name" value="{{old('name')}}">
                            {{--<span><i class="fa fa-exclamation-circle yellow"></i></span>--}}
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require" ></i>缩略图：</th>
                        <td>
                            <input type="text" size="50" name="url">
                            <script src="{{asset('resources/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
                            <link rel="stylesheet" type="text/css" href="{{asset('resources/org/uploadify/uploadify.css')}}">
                            <input id="file_upload" name="file_upload" type="file" multiple="multiple">
                            <script type="text/javascript">
                                <?php $timestamp = time();?>
                                $(function() {
                                    var img_arr = new Array();
//                                    img_arr=[];
                                    $('#file_upload').uploadify({
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                            '_token'     : '{{csrf_token()}}',
//                                            'id':,
                                        },
                                        'buttonText' : '上传图片',
                                        'multi'    :true,
                                        'swf'      : "{{asset('resources/org/uploadify/uploadify.swf')}}",
                                        'uploader' : "{{route('upload_image')}}",
                                        'onUploadSuccess' : function(file, data, response) {
//
                                            $('input[name=url]').val(data);
                                            $('.thumb_img').attr('src',data);
                                        }
                                    });
                                });
                            </script>
                        </td>
                    </tr>

                    <tr>
                        <th></th>
                        <td class="img_show">
                            <img src="" alt="" class="thumb_img" style="max-width: 350px;max-height: 100px">
                        </td>
                    </tr>


                    <tr>
                        <th>排序</th>
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
<style>
    .uploadify{display:inline-block;}
    .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
    table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
    /*.img_show img{width: 350px;height:100px;}*/
</style>
