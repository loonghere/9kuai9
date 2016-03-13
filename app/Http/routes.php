<?php
// 前台路由
Route::get('/', 'IndexController@index');
Route::get('items/{id}.html', 'IndexController@show');

Route::group(['middleware' => ['web']], function ()
{
    // 后台路由
	Route::get('admin/login', 'Admin\LoginController@index');
	Route::post('admin/login', 'Admin\LoginController@login');
	Route::group(['middleware' => ['adminauth']], function()
	{
		// 后台首页
		Route::get('admin/index', 'Admin\IndexController@index');
		Route::get('admin/index/left', 'Admin\IndexController@left');
		Route::get('admin/index/panel', 'Admin\IndexController@panel');
		Route::match(['get', 'post'], 'admin/index/reset', 'Admin\IndexController@reset');
		Route::get('admin/index/logout', 'Admin\IndexController@logout');
		// 分类
		Route::resource('admin/category', 'Admin\CategoryController', ['except' => ['create', 'show', 'destroy']]);
		// 商品
		Route::resource('admin/items', 'Admin\ItemsController', ['except' => ['show', 'destroy']]);
		Route::get('admin/items/getAjaxItemInfo', 'Admin\ItemsController@getAjaxItemInfo');
		Route::get('admin/items/delete/{id}', 'Admin\ItemsController@delete');
	});
});

// 测试路由
Route::get('test', 'TestController@index');