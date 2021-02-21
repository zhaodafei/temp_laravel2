<?php

// 其他
Route::group(['prefix' => 'prescription'],function (){
    Route::post('checkPre', 'prescriptionController@checkPre');
});

// 图书管理系统
Route::group(['prefix' => 'user'],function (){
    // 登录 demo.yizheng_fei.com/api/user/login
    Route::post('login', 'UserController@login');

    // 访问地址 http://demo.yizheng_fei.com/api/user/detail?id=3
    // 免登录测试地址
    Route::get('detail', 'BookController@bookDetail');
});
// 必须登录才可以访问
Route::middleware('jwt')->group(function () {
    // 退出登录 demo.yizheng_fei.com/api/user/login
    Route::group(['prefix' => 'user'], function () {
        Route::post('logout', 'UserController@logout');
    });

    // 图书管理
    Route::group(['prefix' => 'book'], function () {
        // demo.yizheng_fei.com/api/book/list
        Route::get('list', 'BookController@bookList');
        Route::post('add', 'BookController@bookAdd');
        Route::get('detail', 'BookController@bookDetail');
        Route::post('del', 'BookController@bookdel');
    });

});
