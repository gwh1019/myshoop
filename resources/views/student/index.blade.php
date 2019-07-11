<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>展示</title>
</head>
<link rel="stylesheet" type="text/css" href="{{asset('css/page.css')}}">
<body>
    <form>
            <input type="text" name="sname" value="{{$query['sname']??''}}" placeholder="请输入名称关键字">
            <input type="text" name="age" value="{{$query['age']??''}}" placeholder="请输入年龄关键字">
            <button>搜索</button>
    </form>
    <table>
        <tr>
            <td>id</td>
            <td>姓名</td>
            <td>性别</td>
            <td>年龄</td>
            <td>操作</td>
        </tr>
        @foreach($info as $v)
        <tr>
            <td>{{$v->sid}}</td>
            <td>{{$v->sname}}</td>
            <td>{{$v->sex}}</td>
            <td>{{$v->age}}</td>
            <td><a href="del/{{$v->sid}}">删除</a>||<a href="{{url('/student/edit',['id'=>$v->sid])}}">修改</a></td>
        </tr>
        @endforeach
    </table>
    {{$info->appends($query)->links()}}
</body>
</html>