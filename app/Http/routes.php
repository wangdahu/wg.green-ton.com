<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/home');
});

/*Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::resource('articles', 'ArticlesController');
    Route::resource('news', 'NewsController');
    Route::post('news/praise', 'NewsController@praise');

    Route::resource('user', 'UserController');
    Route::post('user/avatar', 'UserController@avatar');

    Route::get('friend/search', 'FriendController@search');
    Route::resource('friend', 'FriendController');

    Route::auth();

    Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
    Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');

    Route::get('/home', 'HomeController@index');

    Route::get('/wechat/menu', 'Admin\MenuController@menu');
    Route::get('/wechat/menu/all', 'Admin\MenuController@all');
    Route::get('/wechat/menu/edit', 'Admin\MenuController@all');
    Route::get('/wechat/news', 'Admin\MaterialController@news');
    Route::get('/wechat/images', 'Admin\MaterialController@images');
    Route::post('/wechat/images/save', 'Admin\MaterialController@saveImages');


});
Route::any('/wechat', 'Admin\WechatController@serve');
