<?php 

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'app'], function () {

    Route::get('/',             [App\Http\Controllers\ApplicantController::class, 'chats'])->name('chats');
    Route::get('chats',         [App\Http\Controllers\ApplicantController::class, 'chats'])->name('chats');
    Route::get('contacts',      [App\Http\Controllers\ApplicantController::class, 'contacts'])->name('contacts');
    Route::get('dashboard',     [App\Http\Controllers\ApplicantController::class, 'dashboard'])->name('dashboard');
    Route::get('departments',   [App\Http\Controllers\ApplicantController::class, 'departments'])->name('departments');
    Route::get('notices',       [App\Http\Controllers\ApplicantController::class, 'notices'])->name('notices');
    Route::get('profile',       [App\Http\Controllers\ApplicantController::class, 'profile'])->name('profile');
    Route::get('settings',      [App\Http\Controllers\ApplicantController::class, 'settings'])->name('settings');
    Route::get('ticket',        [App\Http\Controllers\ApplicantController::class, 'ticketing'])->name('ticketing');
    
    //Auto Redirect
    Route::get('chats/{any}',              [App\Http\Controllers\ApplicantController::class, 'chats'])->where('any', '.*')->name('chats');
    Route::get('departments/{any}',        [App\Http\Controllers\ApplicantController::class, 'departments'])->where('any', '.*');
    Route::get('internet/{any}',           [App\Http\Controllers\ApplicantController::class, 'internet'])->where('any', '.*');
    //Route::get('notices/{any}',            [App\Http\Controllers\ApplicantController::class, 'notices'])->where('any', '.*');
    //Route::get('policies/{any}',           [App\Http\Controllers\ApplicantController::class, 'policies'])->where('any', '.*');
    //Route::get('settings/{any}',           [App\Http\Controllers\ApplicantController::class, 'settings'])->where('any', '.*');

    Route::get('ticketing/{any}',          [App\Http\Controllers\ApplicantController::class, 'ticketing'])->where('any', '.*');
});