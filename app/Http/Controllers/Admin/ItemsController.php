<?php
/**
 * 后台商品控制器
 * @author 王雷 <loonghere@qq.com>
 */
namespace App\Http\Controllers\Admin;
use Session;
use Request;
use App;
class ItemsController extends BaseController
{

	public function index()
	{
		$data = [
			'category' => App\Models\Category::getCategorySelect(),
			'items' => App\Models\Items::getItemsList(),
		];
		return view('admin.items.index', $data);
	}

	public function create()
	{
		$data = [
			'category' => App\Models\Category::getCategorySelect(),
		];
		return view('admin.items.create', $data);
	}

	public function store()
	{
		$input = Request::all();
		$input['author'] = $this->username;
		App\Models\Items::getItemStore($input);
		$data = [
			'msg' => '商品添加成功！',
			'jump' => '/admin/items',
			'second' => 3,
		];
		return view('public.tip', $data);
	}

	public function edit($id)
	{
		return 'edit' . $id;
	}

	public function update($id)
	{
		return 'update' . $id;
	}

	public function delete($id)
	{
		$id = intval($id);
		App\Models\Items::where('id', '=', $id)->delete();
		$data = [
			'msg' => '宝贝删除成功！',
			'jump' => $_SERVER["HTTP_REFERER"],
			'second' => 3,
		];
		return view('public.tip', $data);
	}

	public function getAjaxItemInfo()
	{
		$link = Request::get('link');
		$taobao = new App\Common\Taobao;
		$data = $taobao->getInfo($link);
		if ($data) {
			$response = ['status' => 1, 'data' => $data];
		} else {
			$response = ['status' => 0, 'msg' => '采集出错，请检查'];
		}
		return json_encode($response, 256);
	}
}