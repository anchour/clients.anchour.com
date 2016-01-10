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

Route::group(['prefix' => 'api'], function () {
    Route::get('mailing-list', 'Api\MailingListController@index');
});

Route::group(['middleware' => 'web'], function () {
    Route::get('/', function() {
        return redirect('auth/login');
    });

    // Auth routes.
    Route::group(['prefix' => 'auth'], function() {
        Route::auth();
    });

    Route::get('/admin', [
        'as' => 'admin.index',
        'uses' => 'Admin\DashboardController@index'
    ]);


    Route::get('/admin/mailing-list', [
        'as' => 'admin.mailing-list.index',
        'uses' => 'Admin\MailingListController@getIndex'
    ]);

    Route::get('admin/mailing-list/new', [
        'as' => 'admin.mailing-list.new.get',
        'uses' => 'Admin\MailingListController@getNew'
    ]);

    Route::post('/admin/mailing-list', [
        'as' => 'admin.mailing-list.new.post',
        'uses' => 'Admin\MailingLIstController@postNew'
    ]);
});
