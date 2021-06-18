<?php

// デフォルトのコメント部分は省略

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::resource('users','UsersController');

Route::resource('questions','QuestionsController');
Route::resource('blogs','BlogsController');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin.form');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('admin.regist');

Route::post('/login/admin', 'Auth\LoginController@adminLogin')->name('admin.login');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('admin-register');

Route::view('/admin', 'admin')->middleware('auth:admin')->name('admin-home');