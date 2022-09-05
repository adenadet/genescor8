<?php 

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'app'], function () {
    /*
    Route::post('/messenger/add', 'MessengerController@add')->name('messenger.add');
    Route::get('/messenger/private', 'MessengerController@private')->name('messenger.private');
    Route::get('/messenger/room', 'MessengerController@room')->name('messenger.room');
    Route::get('/rooms/check/{id}', 'RoomController@check')->name('rooms.check');
    */

    Route::get('chats',         [App\Http\Controllers\ModulesController::class, 'chats'])->name('chats');
    Route::get('contacts',      [App\Http\Controllers\ModulesController::class, 'contacts'])->name('contacts');
    Route::get('dashboard',     [App\Http\Controllers\ModulesController::class, 'dashboard'])->name('dashboard');
    Route::get('departments',   [App\Http\Controllers\ModulesController::class, 'departments'])->name('departments');
    Route::get('notices',       [App\Http\Controllers\ModulesController::class, 'notices'])->name('notices');
    Route::get('profile',       [App\Http\Controllers\ModulesController::class, 'profile'])->name('profile');
    Route::get('settings',      [App\Http\Controllers\ModulesController::class, 'settings'])->name('settings');
    Route::get('ticket',        [App\Http\Controllers\ModulesController::class, 'ticketing'])->name('ticketing');
    
    //Auto Redirect
    Route::get('chats/{any}',              [App\Http\Controllers\ModulesController::class, 'chats'])->where('any', '.*');
    Route::get('departments/{any}',        [App\Http\Controllers\ModulesController::class, 'departments'])->where('any', '.*');
    Route::get('internet/{any}',           [App\Http\Controllers\ModulesController::class, 'internet'])->where('any', '.*');
    Route::get('notices/{any}',            [App\Http\Controllers\ModulesController::class, 'notices'])->where('any', '.*');
    Route::get('policies/{any}',           [App\Http\Controllers\ModulesController::class, 'policies'])->where('any', '.*');
    Route::get('settings/{any}',           [App\Http\Controllers\ModulesController::class, 'settings'])->where('any', '.*');
    Route::get('staff_month/{any}',        [App\Http\Controllers\ModulesController::class, 'staff_month'])->where('any', '.*');
    Route::get('ticketing/{any}',          [App\Http\Controllers\ModulesController::class, 'ticketing'])->where('any', '.*');
});