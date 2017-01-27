@extends('layouts.admin')
@section('title','新增文章')
@section('content')

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{route('admin_info')}}">首页</a> &raquo; 文章管理
        <div style="width: 20px;display: inline-block;"></div><i class="fa fa-recycle"></i></i><a href="{{route('admin.article.create')}}">刷新</a>

    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>新增文章</h3>
            @include('errors.errors')
        </div>
        <div class="result_content">
            <div class="short_wrap">
                @include('admin.article.article_nav')
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
{{--        {!! Form::open(['route'=>'admin.article.store','method'=>'POST','files'=>'true']) !!}--}}
        {!! Form::open(['route'=>'admin.article.store','method'=>'POST','files'=>'true']) !!}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>分类：</th>
                        <td>
                            <select name="category_id">
                                <option value="">选择分类</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>文章标题：</th>
                        <td>
                            <input type="text" class="lg" name="name">
                            {{--<p>标题可以写30个字</p>--}}
                        </td>
                    </tr>
                    <tr>
                        <th>作者：</th>
                        <td>
                            <input type="text" name="editor">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require"></i>关键词：</th>
                        <td>
                            <input type="text" class="lg" name="kewords">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require" ></i>缩略图：</th>
                        <td>
                        <input type="text" size="50" name="thumb">
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
                                            $('input[name=thumb]').val(data);
                                            $('.thumb_img').attr('src',data);
//                                            $('.img_show').append('<img/>');
//                                            img_arr=img_arr.concat(data);
//                                            return data;
//                                            $('.img_show').children().attr('src',data);

                                        }
                                    });
//                                    console.log(data);
//                                    img_arr=img_arr.concat(data);
//                                    console.log(img_arr);
                                });
                            </script>
                         </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td class="img_show">
                            <img src="" alt="" class="thumb_img" style="max-width: 350px;max-height: 100px">
                            {{--<img src="/resources/uploads/20170111013439319.png" alt="">--}}
                            {{--/Users/Tommy/Desktop/learning_test/la_blog_basic/blog/public/resources/uploads/20170111013439319.png--}}
                        </td>
                    </tr>


                    <tr>
                        <th>单选框：</th>
                        <td>
                            <label for=""><input type="radio" name="">单选按钮一</label>
                            <label for=""><input type="radio" name="">单选按钮二</label>
                        </td>
                    </tr>

                    <tr>
                        <th>描述：</th>
                        <td>
                            <textarea name="desc"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>文章内容：</th>
                        <td>
                            <script id="editor" name="text_content" type="text/plain" style="width:600px;height:300px;"></script>
                            @include('admin.article.ueditor')

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
