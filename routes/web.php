<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/',             [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tests',        [App\Http\Controllers\TestController::class, 'index'])->name('test');
Route::get('/app',          [App\Http\Controllers\ApplicantController::class, 'index'])->name('app');
Route::get('/blogs',        [App\Http\Controllers\BlogController::class, 'index'])->name('blogs');
Route::get('/agency',       [App\Http\Controllers\HomeController::class, 'index'])->name('agency');
Route::get('/consultant',   [App\Http\Controllers\HomeController::class, 'index'])->name('consultant');
Route::get('/staffs',       [App\Http\Controllers\StaffController::class, 'index'])->name('staff');
Route::get('/pharmacy',     [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/clear-cache', function() {
    //$exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');-san::call('route:cache');
    $exitCode = Artisan::call('cache:clear');
    
    return "All done boss, anything else";
    // return what you want
});

//Route::get('/agency', [App\Http\Controllers\AgencyController::class, 'index'])->name('agency');

Route::namespace('App\Http\Controllers')->middleware(['auth:api', 'role:Agency'])->name('agency.')->group(base_path('routes/web/agency.php'));
Route::namespace('App\Http\Controllers')->middleware(['auth:api',])->name('app.')->group(base_path('routes/web/app.php'));
Route::namespace('App\Http\Controllers')->middleware(['auth:api', 'role:Consultant'])->name('consultant.')->group(base_path('routes/web/consultant.php'));
Route::namespace('App\Http\Controllers')->middleware(['auth:api', 'role:Staff'])->name('staffs.')->group(base_path('routes/web/staff.php'));
Route::group(['middleware' => ['auth'],'namespace' => 'App\Http\Controllers', 'name' => 'app', 'prefix' => '/app'], function () {
    Route::get('/',             'ApplicantController@index');
    Route::get('/{any}',        'ApplicantController@index')->where('any', '.*');
});
/*
Route::group(['middleware' => ['auth', 'role:Consultant'],'namespace' => 'App\Http\Controllers', 'name' => 'consultants', 'prefix' => '/consultants'], function () {
    Route::get('/',             'ConsultantController@index');
    Route::get('/{any}',        'ConsultantController@index')->where('any', '.*');
});

Route::group(['middleware' => ['auth', 'role:Staff'],'namespace' => 'App\Http\Controllers', 'prefix' => '/staffs'], function () {
    Route::get('/',             'StaffController@index');
    
});
*/