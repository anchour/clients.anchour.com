<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::get('/', function() {
        return redirect('auth/login');
    });

    // Auth routes.
    Route::group(['prefix' => 'auth'], function() {
        Route::auth();
    });

    Route::get('/admin/mailing-list', [
        'as' => 'admin.mailing-list.create',
        'uses' => 'Admin\MailingListController@create'
    ]);

    Route::post('/admin/mailing-list', [
        'as' => 'admin.mailing-list.store',
        'uses' => 'Admin\MailingLIstController@store'
    ]);
});
