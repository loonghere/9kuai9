<?php
/**
 * 商品分类Model
 * @author 王雷 <loonghere@qq.com>
 */
namespace App\Models;

class Category extends BaseModel
{
    protected $table = 'category';

    public static function getCategorySelect()
    {
    	$data = self::orderBy('id', 'asc')->get()->toArray();
    	foreach ($data as $key => $val) {
    		$category[$val['id']] = $val['name'];
    	}
    	return $category;
    }
}