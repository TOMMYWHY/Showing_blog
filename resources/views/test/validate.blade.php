
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="{{route('password_validate')}}" method="post">
    {{csrf_field()}}
    <input type="text" name="password_o" value="{{old('password_o')}}"> </i>请输入原始密码</span>
    <input type="text" name="password" value="{{old('password')}}"> </i>新密码6-20位</span>
    <input type="text" name="password_confirmation" value="{{old('password_confirmation')}}"> </i>再次输入密码</span>
    <input type="submit" value="提交">
</form>
result
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</body>
</html>