<?php
/**
 * 后台首页控制器
 * @author 王雷 <loonghere@qq.com>
 */
namespace App\Http\Controllers\Admin;
use App;
use Session;
use Request;
class IndexController extends BaseController
{

	public function index()
	{
		return view('admin.index.index', ['admin' => $this->username]);
	}

	public function left()
	{
		$menu = [
			'商品分类' => [
				1 => ['title' => '商品分类', 'url' => '/admin/category'],
			],
			'商品管理' => [
				2 => ['title' => '添加商品', 'url' => '/admin/items/create'],
				3 => ['title' => '商品管理', 'url' => '/admin/items'],
			],
			'个人设置' => [
				4 => ['title' => '修改密码', 'url' => '/admin/index/reset'],
			],
		];
		return view('admin.index.left', ['menu' => $menu]);
	}

	public function panel()
	{
		return view('admin.index.panel', ['admin' => $this->username]);
	}

	public function reset()
	{
		if (Request::isMethod('get')) {
			return view('admin/index.reset');
		} else {
			$input = Request::all();
			$input['adminid'] = $this->adminid;
			App\Models\Admin::getAdminUpdate($input);
			$data = [
				'msg' => '密码修改成功！',
				'jump' => '/admin/index/reset',
				'second' => 3,
			];
			return view('public.tip', $data);
		}
	}

	public function logout()
	{
		Session::flush();
		return redirect('/');
	}
}