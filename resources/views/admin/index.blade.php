@extends('layouts/admin')
@section('title', '后台首页')
	@section('content')
	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">后台管理</div>
			<ul>
				<li><a href="{{url('/')}}" class="active">首页</a></li>
				<li><a href="{{route('admin_index')}}">管理页</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>
				{{--<li>管理员：{{$user}}</li>--}}
				<li>管理员：{{session('user')->username}}</li>
				<li><a href="{{route('admin_change_password')}}" target="main">修改密码</a></li>
				<li><a href="{{route('admin_logout')}}">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

		<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
            <li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>常用操作</h3>
                <ul class="sub_menu">
                    <li><a href="{{route('admin.category.create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>新增分类</a></li>
                    <li><a href="{{route('admin.category.index')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>分类列表</a></li>
                    <li><a href="{{route('admin.article.create')}}" target="main"><i class="fa fa-fw fa-list-alt"></i>新增文章</a></li>
                    <li><a href="{{route('admin.article.index')}}" target="main"><i class="fa fa-fw fa-image"></i>全部文章</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-cog"></i>其他设置</h3>
                <ul class="sub_menu">
                    <li><a href="{{route('admin.banner.index')}}" target="main"><i class="fa fa-fw fa-cubes"></i>Banner管理</a></li>
                    <li><a href="{{route('admin.banner.index')}}" target="main"><i class="fa fa-fw fa-database"></i>邮件管理</a></li>
                </ul>
            </li>
            {{--<li>--}}
            	{{--<h3><i class="fa fa-fw fa-thumb-tack"></i>工具导航</h3>--}}
                {{--<ul class="sub_menu">--}}
                    {{--<li><a href="http://www.yeahzan.com/fa/facss.html" target="main"><i class="fa fa-fw fa-font"></i>图标调用</a></li>--}}
                    {{--<li><a href="http://hemin.cn/jq/cheatsheet.html" target="main"><i class="fa fa-fw fa-chain"></i>Jquery手册</a></li>--}}
                    {{--<li><a href="http://tool.c7sky.com/webcolor/" target="main"><i class="fa fa-fw fa-tachometer"></i>配色板</a></li>--}}
                    {{--<li><a href="element.html" target="main"><i class="fa fa-fw fa-tags"></i>其他组件</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        </ul>
	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">
		<iframe src="{{url('admin/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
	</div>
	<!--主体部分 结束-->
	<!--底部 开始-->
	<div class="bottom_box">
		CopyRight © 2017. Powered By <a href="http://tommywhy.tk">tommywhy.tk</a>.
	</div>
	<!--底部 结束-->
	@endsection