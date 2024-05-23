<?php

// 自行测试地址,不需要登录
Route::group(['prefix' => 'foo'],function (){
    // GET http://demo.yizheng_fei.com/api/foo/da
    Route::get('da', 'FeiController@da');

    // POST http://demo.yizheng_fei.com/api/foo/fei
    Route::post('fei', 'FeiController@fei');

});

// 其他
Route::group(['prefix' => 'prescription'],function (){
    Route::post('checkPre', 'prescriptionController@checkPre');
});

// 图书管理系统
Route::group(['prefix' => 'user'],function (){
    // 登录 demo.yizheng_fei.com/api/user/login
    Route::post('login', 'UserController@login');

    // 免登录测试地址 http://demo.yizheng_fei.com/api/user/detail?bookId=3
    Route::get('detail', 'BookController@bookDetail');
    Route::get('fei', 'BookController@fei');
});

// 日历管理
Route::group(['prefix' => 'calendar'],function (){
    Route::get('list', 'CalendarController@calendarList');
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

    // 商品管理
    Route::group(['prefix' => 'goods'], function () {
        Route::get('list', 'GoodsController@goodsList');
        Route::post('add', 'GoodsController@goodsAdd');
        Route::get('detail', 'GoodsController@goodsDetail');
        Route::post('del', 'GoodsController@goodsdel');
    });

    // 价格统计
    Route::group(['prefix' => 'billCount'], function () {
        Route::get('list', 'BillCountController@billCountList');
        Route::post('add', 'BillCountController@billCountAdd');
        Route::post('budget', 'BillCountController@billCountBudget');
        Route::post('del', 'BillCountController@billCountDel');
    });
});
