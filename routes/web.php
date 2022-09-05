<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/app', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/patient', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Route::get('/clear-cache', function() {
    //$exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    //$exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('cache:clear');
    
    return "All done boss, anything else";
    // return what you want
});

Route::namespace('App\Http\Controllers')->middleware(['auth:api', 'role:Agency'])->name('agency.')->group(base_path('routes/web/agency.php'));
Route::namespace('App\Http\Controllers')->middleware(['auth:api'])->name('app.')->group(base_path('routes/web/app.php'));
Route::namespace('App\Http\Controllers')->middleware(['auth:api', 'role:Consultant'])->name('consultant.')->group(base_path('routes/web/consultant.php'));
Route::namespace('App\Http\Controllers')->middleware(['auth:api', 'role:Staff'])->name('staff.')->group(base_path('routes/web/staff.php'));

Route::group(['middleware' => ['auth'],'namespace' => 'App\Http\Controllers\EMR', 'name' => 'eservices.', 'prefix' => '/eservices'],function(){
    Route::get('/administrator',          'ServiceController@administrator');
    Route::get('/front_office',           'ServiceController@front');
    Route::get('/medical_officer',        'ServiceController@medical');
    Route::get('/radiologist',            'ServiceController@radiologist');

    Route::get('/administrator/{any}',    'ServiceController@administrator')->where('any', '.*'); 
    Route::get('/front_office/{any}',     'ServiceController@front')->where('any', '.*');
    Route::get('/medical_officer/{any}',  'ServiceController@medical')->where('any', '.*');
    Route::get('/radiologist/{any}',      'ServiceController@radiologist')->where('any', '.*'); 
});

Route::group(['middleware' => ['auth'],'namespace' => 'App\Http\Controllers', 'name' => 'app.', 'prefix' => '/app'], function () {
    
});

Route::group(['middleware' => ['auth', 'role:Agency'],'namespace' => 'App\Http\Controllers', 'name' => 'agencies.', 'prefix' => '/agencies'], function () {
    Route::get('/',             'AgencyController@index');
    Route::get('/{any}',        'AgencyController@index')->where('any', '.*');
});

Route::group(['middleware' => ['auth', 'role:Consultant'],'namespace' => 'App\Http\Controllers', 'name' => 'consultants.', 'prefix' => '/consultants'], function () {
    Route::get('/',             'ConsultantController@index');
    Route::get('/{any}',        'ConsultantController@index')->where('any', '.*');
});

Route::group(['middleware' => ['auth', 'role:Staff'],'namespace' => 'App\Http\Controllers', 'name' => 'staffs.', 'prefix' => '/staffs'], function () {
    Route::get('/',             'StaffController@index');
    Route::get('/{any}',        'StaffController@index')->where('any', '.*');
});
