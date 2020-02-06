<?php
Route::get('/test', function () {
   return ['test' => 1];
});
Route::post('/register', 'AuthController@register')->name('register');
Route::post('/login', 'AuthController@login')->name('login');
Route::get('/user', 'AuthController@user')->name('user');
Route::post('/logout', 'AuthController@logout')->name('logout');
