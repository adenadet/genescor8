<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Api\Blogs')->name('api.blogs.')->prefix('/blogs')->group(base_path('routes/api/blog.php'));
Route::namespace('App\Http\Controllers\Api\Chats')->middleware('auth:api')->name('api.chats.')->group(base_path('routes/api/chats.php'));
Route::namespace('App\Http\Controllers\Api\EMR')->middleware('auth:api')->name('api.emr.')->group(base_path('routes/api/emr.php'));
Route::namespace('App\Http\Controllers\Api\Pharmacy')->name('api.pharmacy.')->prefix('/pharmacy')->group(base_path('routes/api/pharmacy.php'));
Route::namespace('App\Http\Controllers\Api\Ticketing')->middleware('auth:api')->name('api.tickets.')->group(base_path('routes/api/ticket.php'));
Route::namespace('App\Http\Controllers\Api\Ums')->middleware('auth:api')->name('api.ums.')->group(base_path('routes/api/ums.php'));

Route::group(['namespace'=>'App\Http\Controllers\Api', 'middleware'=>['auth:api'], 'name'=>'api.'], function () {
    Route::apiResources([
        '/dashboard'     => 'DashboardController',
    ]);
});

Route::get('/access_token', 'App\Http\Controllers\Api\GenerateAccessTokenController@generate_token');
Route::post('/login', 'App\Http\Controllers\Api\AuthController@login');
Route::post('/logout', 'App\Http\Controllers\Api\AuthController@logout')->middleware('auth:api');
Route::post('/register', 'App\Http\Controllers\Api\AuthController@register');
Route::get('/user', 'App\Http\Controllers\Api\AuthController@user')->middleware('auth:api');