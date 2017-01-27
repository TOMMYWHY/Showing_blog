
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>

{{--<form action="{{route('uploads')}}" method="post" enctype="multipart/form-data" >--}}
    {{--{{csrf_field()}}--}}
    {{--<label for="">上传图片</label>--}}
    {{--<input type="file" multiple="multiple" name="imgs[]">--}}
    {{--<input type="submit" value="提交">--}}
{{--</form>--}}



{{--<script type="text/javascript">--}}
    {{--function onc(){--}}
        {{--var files = document.getElementById("input").files;--}}
        {{--for(var i=0; i< files.length; i++){--}}
{{--//            alert(input.files[i]);--}}
            {{--$.post('{{route('uploads')}}',--}}
                {{--{--}}
                    {{--'_token':'{{csrf_token()}}',--}}
                    {{--'imgs':input.files[i],--}}
                {{--},--}}
                {{--function (data) {--}}

            {{--});--}}
        {{--}--}}
    {{--}--}}
{{--</script>--}}
{{--<form action="{{route('uploads')}}" method="post">--}}
    {{--{{csrf_field()}}--}}
    {{--选择图片：<input type="file" id="input" name="imgs" onchange="onc()" multiple="multiple" />--}}
    {{--选择图片：<input type="file" id="input" name="imgs"  multiple="multiple" />--}}
    {{--<input type="submit" />--}}
{{--</form>--}}
<hr>
<p>请尝试在浏览文件时选取一个以上的文件。</p>

aa<form method="POST" action="{{route('uploads')}}" enctype="muitipart/form-data">
    {{csrf_field()}}
    111<input type="file" name="imgs[]" multiple="multiple" />
    <input type="submit" name="submit" value="Submit" />

</form>
<hr>
{{--{!! Form::open(['route'=>'uploads','method'=>'POST','files'=>'true']) !!}--}}
{{--{!! Form::file('images[]', ['id'=>'images_id']) !!}--}}
{{--{!! Form::submit('提交',['class'=>'btn btn-primary']) !!}--}}
{{--{!! Form::close() !!}--}}
</body>
</html>