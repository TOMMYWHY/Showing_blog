<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/resources/admin/style/css/ch-ui.admin.css">
	<link rel="stylesheet" href="/resources/admin/style/font/css/font-awesome.min.css">
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>Admin</h1>
		<h2>欢迎使用后台管理系统</h2>
		<div class="form">
			@if(session('msg'))
				<p style="color:red">{{session('msg')}}</p>
			@endif

			{!! Form::open(['route'=>'admin_login','method'=>'post']) !!}
				<ul>
					<li>
						{!! Form::text('username',null,['class'=>'text']) !!}
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						{!! Form::password('password',['class'=>'text']) !!}
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						{!! Form::text('code',null,['class'=>'code']) !!}
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="{{route('admin_code')}}" style="cursor: pointer" onclick="this.src='{{route('admin_code')}}?'+Math.random()" >
					</li>
					<li>
						{!! Form::submit('登陆',['class'=>'']) !!}
					</li>
				</ul>
			{!! Form::close() !!}
			<p><a href="{{url('/')}}">返回首页</a> &copy; 2017 Powered by <a href="http://tommywhy.tk" target="_blank">http://tommywhy.tk</a></p>
		</div>
	</div>
</body>
</html>