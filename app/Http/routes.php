<?php

Route::group(['prefix' => 'api'], function () {
    Route::get('mailing-list', 'Api\MailingListController@index');
});

Route::group(['middleware' => 'web'], function () {
    Route::get('/', function () {
        return redirect('auth/login');
    });

    /*
     * Customer routes. Add new ones (client-side), etc. No need for update/delete.
     */
    Route::get('/customer/new', ['uses' => 'CustomerController@create']);

    Route::post('/customer/new', ['uses' => 'CustomerController@store']);

    // Auth routes.
    Route::group(['prefix' => 'auth'], function () {
        Route::auth();
    });

    Route::get('/admin', [
        'as'   => 'admin.index',
        'uses' => 'Admin\DashboardController@index'
    ]);

    Route::get('/admin/mailing-list', [
        'as'   => 'admin.mailing-list.index',
        'uses' => 'Admin\MailingListController@getIndex'
    ]);

    Route::get('admin/mailing-list/new', [
        'as'   => 'admin.mailing-list.new.get',
        'uses' => 'Admin\MailingListController@getNew'
    ]);

    Route::post('/admin/mailing-list', [
        'as'   => 'admin.mailing-list.new.post',
        'uses' => 'Admin\MailingLIstController@postNew'
    ]);
});
