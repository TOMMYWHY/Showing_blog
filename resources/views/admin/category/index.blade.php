@extends('layouts.admin')

        @section('title','全部分类')
        @section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{route('admin_info')}}">首页</a> &raquo; 分类管理
        <div style="width: 20px;display: inline-block;"></div><i class="fa fa-recycle"></i></i><a href="{{route('admin.category.index')}}">刷新</a>

    </div>
    <!--面包屑导航 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <div class="result_title">
                <h3> 全部分类</h3>
            </div>
            <!--快捷导航 开始-->
            <div class="result_content">
                @include('admin.category.category_nav')
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        {{--<th class="tc" width="5%"><input type="checkbox" name=""></th>--}}
                        <th class="tc" width="5%">排序</th>
                        <th class="tc" width="5%">等级</th>
                        <th>分类名称</th>
                        <th>标题</th>
                        <th>关键词</th>
                        <th>更新时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $d)
                    <tr>
                        {{--<td class="tc"><input type="checkbox"  value="59"></td>--}}
                        <td class="tc">
                            <input type="text" onchange="changeOrder(this,'{{$d->id}}')" value="{{$d->order_by}}">
                        </td>
                        {{--<td class="tc">{{$d->id}}</td>--}}
                        <td class="tc">{{$d->level}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->title}}</td>
                        <td>{{$d->keywords}}</td>
                        <td>{{$d->created_at}}</td>
                        <td>
                            <a href="{{route('admin.category.edit',$d->id)}}">修改</a>
                            <a href="javascript:;" onclick="delete_category('{{$d->id}}')">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->
    <script>


        function changeOrder(obj,id) {
            var order=$(obj).val();
            $.post(
                '{{route('cate_change_order')}}',
                {
                    '_token':'{{csrf_token()}}',
                    'id':id,
                    'order':order,
                },
                function (data) {
                    if(data.status){
                        layer.alert(data.msg, {icon: 6});
                    }else{
                        layer.alert(data.msg, {icon: 5});
                    }
                }
            );
        }

        function delete_category(id) {
            //询问框
            layer.confirm('确定删除此分类吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.post(
                    "{{url('admin/category/')}}/"+id,
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
