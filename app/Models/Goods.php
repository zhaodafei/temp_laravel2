<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Goods
 * @property integer $id
 * @property string $goodsName  商品名称
 * @property string $unitPrice  单价
 * @property string $goodsNumber  数量
 * @property integer $countPrice  总价格
 * @property integer $consumeWay  消费途径[线下;线上]
 * @property string  $goodsNumType  商品单号分组[ 时间 + 随机数 ]
 * @property integer $goodsComment 备注
 * @property integer $consumeTime  购买时间
 * @property integer $createdTime  入库时间
 * @property string $delNum    删除次数(0:正常)
 * @property string $create_time  表自己的时间
 * @property string $update_time  表自己的时间
 *
 * @method  static \Illuminate\Database\Eloquent\Builder | \App\Models\Goods query()
 */
class Goods extends Model
{

    public $table = 'goods';

    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    // public $timestamps = false;
    // public $dateFormat = "Y-m-d";




    public $fillable = [
        'goodsName',
        'unitPrice',
        'goodsNumber',
        'countPrice',
        'consumeWay',
        'goodsNumType',
        'goodsComment',
        'consumeTime',
        'createdTime',
        'delNum',
        'create_time',
        'update_time'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'goodsName' => 'string',
        'unitPrice' => 'string',
        'goodsNumber' => 'integer',
        'countPrice' => 'string',
        'consumeWay' => 'string',
        'goodsNumType' => 'string',
        'goodsComment' => 'string',
        'consumeTime' => 'string',
        'createdTime' => 'string',
        'delNum' => 'string',
        'create_time' => 'string',
        'update_time' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

}
