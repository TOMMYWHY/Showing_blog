<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('/resources/admin/style/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('/resources/admin/style/font/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{asset('/resources/admin/style/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('/resources/admin/style/js/ch-ui.admin.js')}}"></script>
    <script type="text/javascript" src="{{asset('/resources/org/layer/layer.js')}}"></script>
    {{--/Users/Tommy/Desktop/learning_test/la_blog_basic/blog/public/resources/org/layer/layer.js--}}
    <style>
        .cursor{cursor: pointer}
    </style>
</head>
<body>
@yield('content')
</body>
</html>