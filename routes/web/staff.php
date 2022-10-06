<?php 

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'staffs'], function () {

    Route::get('chats',         [App\Http\Controllers\StaffController::class, 'chats'])->name('chats');
    Route::get('contacts',      [App\Http\Controllers\StaffController::class, 'contacts'])->name('contacts');
    Route::get('dashboard',     [App\Http\Controllers\StaffController::class, 'dashboard'])->name('dashboard');
    Route::get('departments',   [App\Http\Controllers\StaffController::class, 'departments'])->name('departments');
    Route::get('notices',       [App\Http\Controllers\StaffController::class, 'notices'])->name('notices');
    Route::get('profile',       [App\Http\Controllers\StaffController::class, 'profile'])->name('profile');
    Route::get('settings',      [App\Http\Controllers\StaffController::class, 'settings'])->name('settings');
    Route::get('ticket',        [App\Http\Controllers\StaffController::class, 'ticketing'])->name('ticketing');
    
    //Auto Redirect
    Route::get('/chats/{any}',              [App\Http\Controllers\StaffController::class, 'chats'])->where('any', '.*')->name('chats');
    Route::get('/departments/{any}',        [App\Http\Controllers\StaffController::class, 'departments'])->where('any', '.*');
    Route::get('/internet/{any}',           [App\Http\Controllers\StaffController::class, 'internet'])->where('any', '.*');
    //Route::get('notices/{any}',            [App\Http\Controllers\StaffController::class, 'notices'])->where('any', '.*');
    //Route::get('policies/{any}',           [App\Http\Controllers\StaffController::class, 'policies'])->where('any', '.*');
    //Route::get('settings/{any}',           [App\Http\Controllers\StaffController::class, 'settings'])->where('any', '.*');

    Route::get('/ticketing/{any}',          [App\Http\Controllers\StaffController::class, 'ticketing'])->where('any', '.*');
    Route::get('/{any}',                    [App\Http\Controllers\StaffController::class, 'index'])->where('any', '.*');
});