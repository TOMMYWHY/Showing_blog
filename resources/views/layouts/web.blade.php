<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    @yield('meta')
    @yield('title')

    <link href="{{asset('/resources/web/css/base.css')}}" rel="stylesheet">
    <link href="{{asset('/resources/web/css/index.css')}}" rel="stylesheet">
    <link href="{{asset('/resources/web/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/resources/web/css/new.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('/resources/web/js/modernizr.js')}}"></script>
    <![endif]-->
</head>
<body>
<header>
    <div id="logo"><a href="{{route('index')}}"></a></div>
    <nav class="topnav" id="topnav">
        <a href="{{url('/')}}"><span>首页</span><span class="en">Index</span></a>
    @foreach($navs as $item)<a href="{{url('cate/'.$item->id)}}"><span>{{$item->name}}</span><span class="en">{{$item->title}}</span></a>@endforeach
    </nav>

</header>



{{--@yield('content')--}}
@section('content')
    <h3 class="ph">
        <p>最新<span>文章</span></p>
    </h3>
    <ul class="paih">
        @foreach($new as $n)
            <li><a href="{{url('art/'.$n->id)}}" title="{{$n->title}}" target="_blank">{{$n->title}}</a></li>
        @endforeach
    </ul>
    @show



<footer>
    <p>CopyRight by Tommy <a href="http://www.tommywhy.tk/" target="_blank">http://www.tommywhy.tk</a></p>
</footer>
</body>
</html>
