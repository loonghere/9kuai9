<?php
/**
 * 管理员Model
 * @author 王雷 <loonghere@qq.com>
 */
namespace App\Models;
use DB;
class Admin extends BaseModel
{
    protected $table = 'admin';

    public static function getAdminId($input)
    {
    	return self::whereRaw('username = ? and password = password(?)', [$input['username'], $input['password']])->get(['id'])->toArray();
    }

    public static function getAdminUpdate($input)
    {
    	$password = $input['password'];
    	return self::where('id', '=', $input['adminid'])->update(['password' => DB::raw("password('$password')")]);
    }
}