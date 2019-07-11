<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//前台
Route::get('/','Index\IndexController@index');
//注册
Route::prefix('/login')->group(function(){
    //注册视图
    Route::get('register','Login\LoginController@register');
    //注册执行
    Route::post('reg','Login\LoginController@reg');
    //登录视图
    Route::get('login','Login\LoginController@login');
    //登录执行
    Route::post('do_login','Login\LoginController@do_login');


});

//学生
    //学生展示
    Route::get('student/index','StudentController@index');
    //学生添加页面
    Route::get('student/create','StudentController@create');
    //添加执行页面
    Route::post('student/store','StudentController@store');
    //修改页面
    Route::get('student/edit/{id}','StudentController@edit');
    //修改执行
    Route::post('student/update','StudentController@update');
    //删除页面
    Route::get('student/del/{id}','StudentController@del');