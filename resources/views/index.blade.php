<html>
<head>
    <meta charset="UTF-8">
    <title>index</title>
</head>
<body>

<h1><?php echo $data['name'];echo $data['age']?></h1>
<h2><?php echo $title?></h2>
<h3>{{$title or 'title'}}</h3>
<h3>{{$data['name']}}</h3>
<h3>{{isset($qq)?$qq:'qqaa'}}</h3>
<hr>
<h2>
    @if($data['score']<60)
        less than 60;
        @else
        more than 70;
        @endif
</h2>
{{--<h2>--}}
    {{--@for($i=0;$i<$data['age'];$i++)--}}
        {{--{{$i}} <br>--}}
        {{--@endfor--}}
{{--</h2>--}}
<h2>
    @foreach($data['article'] as $k=>$v)
        @if($k>1)
            {{$k}}:{{$v}}<br>
        @endif
        @endforeach
</h2>
</body>
</html>