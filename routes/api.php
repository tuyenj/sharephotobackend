<?php
Route::post('/register', 'AuthController@register')->name('register');
Route::post('/login', 'AuthController@login')->name('login');
Route::group(['middleware' => 'api'], function ($router) {
    Route::post('/logout', 'AuthController@logout')->name('logout');
});
