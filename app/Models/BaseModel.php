<?php
/**
 * 系统基础model
 * @author 王雷 <loonghere@qq.com>
 */
namespace App\Models;
use Eloquent;

class BaseModel extends Eloquent
{
    /**
     * 软删除
     * @var boolean
     */
    protected $softDelete = false;

    /**
     * 自动维护时间戳
     * @var boolean
     */
    public $timestamps = false;

    /**
     * 其它需要使用日期调整器的字段
     * @var array
     */
    protected $dates = [];

    /**
     * 集体赋值白名单（高优先级）
     * @var array
     */
    protected $fillable = [];

    /**
     * 集体赋值黑名单
     * @var array
     */
    protected $guarded = [];

}