<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| 所有 Laravel 路由都定义在位于 routes 目录下的路由文件中，这些文件通过框架自动加载
| 相应逻辑位于 app/Providers/RouteServiceProvider 类
| routes/web.php 文件定义了 Web 界面的路由，这些路由被分配到了 web 中间件组
| 从而可以使用 Session 和 CSRF 保护等功能
| routes/api.php 中的路由是无状态的，这是因为被分配到了 api 中间件组
|
*/

Route::get('/', function () {
    return view('welcome',['website'=>'laravel']);
});

Route::view('view','welcome',['website'=>'hpf']);
//Route::view('view','welcome',['name'=>'hpf']);

Route::get("user","UserController@getindex");

Route::get("usercon","UserController@connect");

//最基本的 Laravel 路由只接收一个 URI 和一个闭包，并以此为基础提供一个非常简单优雅的路由定义方法：
Route::get('hello', function () {
    return 'Hello, Welcome to LaravelAcademy.org';
});

//有时候还需要注册一个路由响应多种 HTTP 请求动作 —— 这可以通过 match 方法来实现
Route::match(['get', 'post'], 'foo', function () {
    return 'This is a request from get or post';
});

//可以使用 any 方法注册一个路由来响应所有 HTTP 请求动作：
Route::any('bar', function () {
    return 'This is a request from any HTTP verb';
});

//csrf跨站请求伪造攻击
Route::get('form_without_csrf_token', function (){
    return '<form method="POST" action="/hello_from_form"><button type="submit">提交</button></form>';
});

Route::get('form_with_csrf_token', function () {
    return '<form method="POST" action="/hello_from_form">' . csrf_field() . '<button type="submit">提交</button></form>';
});

Route::post('hello_from_form', function (){
   return 'hello laravel!';
});

//路由重定向,其中 here 表示原路由，there 表示重定向之后的路由，301 是一个 HTTP 状态码，用于标识重定向。
Route::redirect('/here', '/there', 301);

//路由参数
Route::get('user/{id}', function ($id) {
    return 'User ' . $id;
});

//可选参数
Route::get('user/{name?}', function ($name = null) {
    return $name;
});

//正则约束
Route::get('user/{name}', function ($name) {
    // $name 必须是字母且不能为空
})->where('name', '[A-Za-z]+');

//全局约束
//如果想要路由参数在全局范围内被给定正则表达式约束，可以使用 pattern 方法。
//需要在 RouteServiceProvider 类的 boot 方法中定义这种约束模式：

//命名路由,定义
Route::get('user/profile', 'UserController@showProfile')->name('profile');
Route::get('redirect', function() {
    // 通过路由名称进行重定向
    return redirect()->route('profile');
});

Route::get('users/{id}', function ($id) {
    $url = route('profile', ['id' => $id]);
    return $url;
})->name('profile1');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

#Route::resource('articles','ArticlesController');
Route::get('/articles', 'ArticlesController@index')->name('articles.index');
// Route::get('/articles/{page?}', 'ArticlesController@index')->name('articles.index');
Route::get('/articles/{id}', 'ArticlesController@show')->name('articles.show');
Route::get('/articles/create', 'ArticlesController@create')->name('articles.create');
Route::post('/articles', 'ArticlesController@store')->name('articles.store');
Route::get('/articles/{id}/edit', 'ArticlesController@edit')->name('articles.edit');
Route::patch('/articles/{id}', 'ArticlesController@update')->name('articles.update');
Route::delete('/articles/{id}', 'ArticlesController@destroy')->name('articles.destroy');

