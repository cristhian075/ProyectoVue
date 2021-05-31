<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('/user')->group( function(){
    Route::post('/login', 'api\v1\LoginController@login');  
    Route::middleware('auth:api')->get('/current','api\v1\UserController@current');  
    Route::middleware('auth:api')->post('users/store','api\v1\UserController@store');
    Route::middleware('auth:api')->put('users/update','api\v1\UserController@update');
    Route::get('/users','api\v1\UserController@index'); 
});

Route::prefix('/product')->group( function(){
    Route::middleware('auth:api')->get('/products','api\v1\ProductController@index'); 
});

Route::prefix('/category')->group( function(){
    Route::middleware('auth:api')->get('/category','api\v1\CategoryController@index'); 
});

