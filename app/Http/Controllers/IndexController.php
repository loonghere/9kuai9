<?php
namespace App\Http\Controllers;
use App;
use Request;
use Redirect;
use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    public function index()
    {
    	$input = Request::all();
    	$data = [
    		'title' => '九块九包邮',
    		'keywords' => '九块九包邮',
    		'description' => '九块九包邮',
			'category' => App\Models\Category::getCategorySelect(),
			'items' => App\Models\Items::getItemsBySearch($input),
			'input' => $input,
		];
    	return view('home.index', $data);
    }

    public function show($id)
    {
    	$item = App\Models\Items::getItemUrlById($id);
    	if ($item) {
    		return Redirect::to($item['click_url']);
    	} else {
    		$data = [
				'msg' => '您要查找的宝贝不存在！',
				'jump' => '/',
				'second' => 3,
			];
			return view('public.tip', $data);
    	}
    }
}