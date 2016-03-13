<?php
/**
 * 商品Model
 * @author 王雷 <loonghere@qq.com>
 */
namespace App\Models;
use DB;
class Items extends BaseModel
{
    protected $table = 'items';

    public static function getItemStore($input)
    {
    	return self::insert([
    		'cate_id' => $input['cate_id'],
    		'item_id' => $input['item_id'],
    		'title' => $input['title'],
    		'intro' => $input['intro'],
    		'nick' => $input['nick'],
    		'seller_id' => $input['seller_id'],
    		'pic_url' => $input['pic_url'],
    		'price' => $input['price'],
    		'volume' => $input['volume'],
    		'coupon_price' => $input['coupon_price'],
    		'coupon_rate' => $input['coupon_rate'],
    		'click_url' => $input['click_url'],
    		'ems' => $input['ems'],
    		'author' => $input['author'],
    	]);
    }

    public static function getItemsList()
    {
        $pagesize = env('PAGESIZE');
        return self::orderBy('id', 'desc')->paginate($pagesize);
    }

    public static function getItemsBySearch($input)
    {
        $pagesize = env('PAGESIZE');
        $order = 'id';
        if (!empty($input['orderby'])) $order = $input['orderby'] == 'new' ? 'id' : 'hits';
        $builder = self::orderBy($order, 'desc');
        if (!empty($input['keyword'])) $builder->whereRaw("title like '%" . $input['keyword'] . "%'");
        if (!empty($input['cate_id'])) $builder->where('cate_id', '=', $input['cate_id']);
        return $builder->paginate($pagesize);
    }

    public static function getItemUrlById($id)
    {
        $id = intval($id);
        self::where('id', '=', $id)->increment('hits');
        return self::find($id, ['click_url']);
    }
}