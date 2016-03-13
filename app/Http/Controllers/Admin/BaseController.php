<?php
/**
 * 后台基础控制器
 * @author 王雷 <loonghere@qq.com>
 */
namespace App\Http\Controllers\Admin;

use Session;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
	public $adminid = 0;
	public $username = '';

	public function __construct()
	{
		$this->adminid = Session::get('adminid');
		$this->username = Session::get('username');
	}
}