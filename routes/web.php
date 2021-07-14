<?php

// デフォルトのコメント部分は省略

Route::get('/', function () {
    return view('index');
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
Route::resource('limitedblogs','LimitedblogsController');
Route::resource('answers','AnswersController');



Route::get('/home', 'HomeController@index')->name('admin.index');



Route::get('admin-signup', 'Auth\AdminRegisterController@showRegistrationForm')->name('adminsignup.get');
Route::post('admin-signup', 'Auth\AdminRegisterController@register')->name('adminsignup.post');

Route::get('adminlogin', 'Auth\AdminLoginController@showLoginForm')->name('adminlogin');
Route::post('adminlogin', 'Auth\AdminLoginController@login')->name('admin.post');
Route::get('adminlogout', 'Auth\AdminLoginController@logout')->name('adminlogout.get');
