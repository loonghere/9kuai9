<?php
namespace App\Http\Controllers;
use App;
use Illuminate\Routing\Controller;

class TestController extends Controller
{
    public function index()
    {
		$taobao = new App\Common\Taobao;
		$response = $taobao->getInfo('https://detail.tmall.com/item.htm?id=42951581774');
    	return json_encode($response, 256);
    }
}