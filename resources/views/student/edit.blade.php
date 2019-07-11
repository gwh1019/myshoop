<!DOCTYPE html>
<html>
<head>
    <title>修改</title>
</head>
<form action="/student/update" method="post">
<input type="hidden" name="sid" value="{{$data->sid}}">
@csrf
    <div>
        姓名：<input type="text" name="sname" value="{{$data->sname}}">
    </div>
    <div>
        性别： <input type="radio" name="sex" value="男" {{$data->sex=='男'?'checked':''}}>男
                <input type="radio" name="sex" value="女" {{$data->sex=='女'?'checked':''}}>女
    </div>
     <div>
        年龄：<input type="text" name="age" value="{{$data->age}}">
    </div>
    <p><button>提交</button></p>
    </form>
</html>