<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class LoginController extends Controller
{
    public function register()
    {
        return view('login.register');
    }

    public function reg(Request $request)
    {
        $data=$request->except(['_token']);
        $data['reg_time']=time();
        //dd($data);
         //添加
        $res = Db::table('user')->insert($data);
        if ($res) {
            return redirect('/login/login');
        }else{
            return error('注册失败','login/register');
        }
    }

    public function login()
    {
       return view('login.login');
    }

    public function do_login(Request $request)
    {
        $data=$request->except(['_token']);
        //dd($data);
        $name = request()->name;
        $pwd = request()->password;

        $info = Db::table('user')->where('name','=',$name)->where('password','=',$pwd)->first();
        if($info){
            return redirect('/');
        }else{
            return redirect('登录失败，用户名或密码不正确');
        }
    }
}
