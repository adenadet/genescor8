<?php 

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'app'], function () {

    Route::get('appointments',  [App\Http\Controllers\ApplicantController::class, 'appointments'])->name('appointments');
    Route::get('chats',         [App\Http\Controllers\ApplicantController::class, 'chats'])->name('chats');
    Route::get('contacts',      [App\Http\Controllers\ApplicantController::class, 'contacts'])->name('contacts');
    Route::get('dashboard',     [App\Http\Controllers\ApplicantController::class, 'dashboard'])->name('dashboard');
    Route::get('departments',   [App\Http\Controllers\ApplicantController::class, 'departments'])->name('departments');
    Route::get('notices',       [App\Http\Controllers\ApplicantController::class, 'notices'])->name('notices');
    Route::get('profile',       [App\Http\Controllers\ApplicantController::class, 'profile'])->name('profile');
    Route::get('settings',      [App\Http\Controllers\ApplicantController::class, 'settings'])->name('settings');
    Route::get('stories',       [App\Http\Controllers\ApplicantController::class, 'settings'])->name('stories');
    Route::get('ticket',        [App\Http\Controllers\ApplicantController::class, 'ticketing'])->name('ticketing');
    
    //Auto Redirect
    Route::get('appointments/{any}',       [App\Http\Controllers\ApplicantController::class, 'appointments'])->where('any', '.*')->name('appointments');
    Route::get('chats/{any}',              [App\Http\Controllers\ApplicantController::class, 'chats'])->where('any', '.*')->name('chats');
    Route::get('departments/{any}',        [App\Http\Controllers\ApplicantController::class, 'departments'])->where('any', '.*');
    Route::get('internet/{any}',           [App\Http\Controllers\ApplicantController::class, 'internet'])->where('any', '.*');
    //Route::get('notices/{any}',            [App\Http\Controllers\ApplicantController::class, 'notices'])->where('any', '.*');
    //Route::get('policies/{any}',           [App\Http\Controllers\ApplicantController::class, 'policies'])->where('any', '.*');
    Route::get('stories/{any}',            [App\Http\Controllers\ApplicantController::class, 'settings'])->where('any', '.*');

    Route::get('ticketing/{any}',          [App\Http\Controllers\ApplicantController::class, 'ticketing'])->where('any', '.*');
});