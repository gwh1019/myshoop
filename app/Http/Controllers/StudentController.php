<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class StudentController extends Controller
{
    //展示
    public function index()
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        $redis->incr('num');
        $num = $redis->get('num');
        echo"访问人数：".$num;
        //搜索
        $query=request()->all();
        $where = [];
        if ($query['sname']??'') {
            $where[]=['sname','like',"%$query[sname]%"];
        }
        if ($query['age']??'') {
            $where['age']= $query['age'];
        }
        //分页
        $pagesize=config('app.pageSize');
        $info = Db::table('student')->where($where)->paginate($pagesize);

        return view('student.index',['info'=>$info,'query'=>$query]);
    }

    //添加页面
    public function create()
    {
        return view('student.create');
    }

    //添加执行
    public function store(Request $request)
    {
        //验证
        $data=$request->except(['_token']);
        $validator = \Validator::make($request->all(), [
            'sname' => 'required',
            'age' => 'required',

        ],[
            'sname.required'=>'用户名必填',
            'age.required'=>'年龄必填',
        ]);

        //dd($$validator->fails());exit;
        if ($validator->fails()) {
            return redirect('student/create')->withErrors($validator)->withInput();
        }
        //添加
        $res = Db::table('student')->insert($data);
        if ($res) {
            return redirect('/student/index');
        }else{
            return error('添加失败','student/create');
        }
    }

    //删除
    public function del($id)
    {
        $res=DB::table('student')->where('sid','=',$id)->delete();
        // dd($res);
        if ($res) {
            return redirect('/student/index');
        }else{
           return error('删除失败','student/index');
        }
    }

    //修改页面
    public function edit($id)
    {
         $data = DB::table('student')->where(['sid'=>$id])->first();

         return view('student.edit',['data'=>$data]);
    }

    //修改执行
    public function update(Request $request)
    {
        $data=$request->except(['_token']);
        $sid=$request->sid;
        $res=DB::table('student')->where(['sid'=>$sid])->update($data);
        if ($res) {
            return redirect('/student/index');
        }
    }

}
