<?php

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', 'ItemController@index');
Route::get('index', 'ItemController@index');
Route::get('/detail/{id}', 'ItemController@detail')->name('detail');

//Route::get('/', function () { return redirect('/home'); });

Route::group(['middleware' => 'auth:user'], function() {
	Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'admin'], function() {
	Route::get('/', function () { return redirect('/admin/home'); });
	Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');//ログインへ飛ばす
	Route::post('login', 'Admin\LoginController@login')->name('admin.login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
	Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');
	Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');

	Route::get('home', 'Admin\HomeController@index')->name('admin.home');//商品一覧へ飛ばすにはここを修正する
	//Route::get('/item', 'Admin\ItemController@index')->name('admin.index');
});
