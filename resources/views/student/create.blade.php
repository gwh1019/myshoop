<!DOCTYPE html>
<html>
<head>
    <title>添加</title>
</head>
<form action="/student/store" method="post">
@if ($errors->any())
    <div class="alert alert-danger">

            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
    </div>
@endif
@csrf
    <div>
        姓名：<input type="text" name="sname">
    </div>
    <div>
        性别： <input type="radio" name="sex" value="男">男
                <input type="radio" name="sex" value="女">女
    </div>
     <div>
        年龄：<input type="text" name="age">
    </div>
    <p><button>提交</button></p>
    </form>
</html>