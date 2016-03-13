<?php
/**
 * 后台商品分类控制器
 * @author 王雷 <loonghere@qq.com>
 */
namespace App\Http\Controllers\Admin;
use Session;
class CategoryController extends BaseController
{

	public function index()
	{
		return 'index';
	}

	public function store()
	{
		return 'store';
	}

	public function edit($id)
	{
		return 'edit' . $id;
	}

	public function update($id)
	{
		return 'update' . $id;
	}
}