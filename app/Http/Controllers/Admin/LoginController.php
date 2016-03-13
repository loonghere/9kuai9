<?php
/**
 * 后台登陆控制器
 * @author 王雷 <loonghere@qq.com>
 */
namespace App\Http\Controllers\Admin;
use App;
use Session;
use Request;
class LoginController extends BaseController
{

	public function index()
	{
		return view('admin.login.index');
	}

	public function login()
	{
		$input = Request::all();
		$row = App\Models\Admin::getAdminId($input);
		if (!count($row)) {
			$data = [
				'msg' => '登陆用户名或密码错误！',
				'jump' => $_SERVER["HTTP_REFERER"],
				'second' => 3,
			];
			return view('public.tip', $data);
		} else {
			Session::put('adminid', $row[0]['id']);
			Session::put('username', $input['username']);
			return redirect('admin/index');
		}
	}
}