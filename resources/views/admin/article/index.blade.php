@extends('layouts.admin')
@section('title','全部文章')
        @section('content')


    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{route('admin_info')}}">首页</a> &raquo; 文章管理
        <div style="width: 20px;display: inline-block;"></div><i class="fa fa-recycle"></i></i><a href="{{route('admin.article.index')}}">刷新</a>

    </div>
    <!--面包屑导航 结束-->
    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <div class="result_title">
                <h3> 全部文章</h3>
                @include('errors.errors')
            </div>
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    @include('admin.article.article_nav')
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        {{--<th class="tc" width="5%"><input type="checkbox" name=""></th>--}}
                        {{--<th class="tc">排序</th>--}}
                        <th class="tc">ID</th>
                        {{--<th>文章标题</th>--}}
                        <th>文章标题</th>
                        <th>作者</th>
                        <th>所属分类</th>
                        <th>查看数量</th>
                        <th>更新时间</th>
                        <th>是否上线</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $item)
                    <tr>
                        {{--<td class="tc"><input type="checkbox" name="id[]" value="59"></td>--}}
                        {{--<td class="tc">--}}
                            {{--<input type="text" name="ord[]" value="0">--}}
                        {{--</td>--}}
                        <td class="tc">{{$item->id}}</td>
                        <td>
                            <a href="#">{{$item->name}} </a>
                        </td>
                        {{--<td>0</td>--}}
                        <td>{{$item->editor}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->count_views}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td>
                            <label for="">
                                上线<input type="radio" name="" >
                            </label>
                            <label for="">
                                离线<input type="radio" name="">
                            </label>
                        </td>
                        <td>
                            <a href="{{route('admin.article.edit',$item->id)}}">修改</a>
                            <a href="javascript:;" onclick="delete_article('{{$item->id}}')">删除</a>
                        </td>
                    </tr>
                    @endforeach

                </table>

                <div class="page_list">
                    <style>
                        .result_content ul li span {
                            font-size: 15px;
                            padding: 6px 12px;
                        }
                    </style>
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

    <script>
        function delete_article(id) {
            //询问框
            layer.confirm('确定删除此文章吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.post(
                    "{{url('admin/article/')}}/"+id,
                    {
                        '_method':'DELETE',
                        '_token':'{{csrf_token()}}',
                    },
                    function (data) {
                        if(data.status){
                            layer.alert(data.msg, {icon: 6});
                            location.href=location.href;
                        }else{
//                            alert(data.msg);
                            layer.alert(data.msg, {icon: 5});
                        }
                    });
            }, function(){});
        }
    </script>

@endsection


