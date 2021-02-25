<?php


namespace App\Models;

use Eloquent as Model;

/**
 * Class BillCount
 * 清库 TRUNCATE bill_count
 * @property integer $id
 * @property string $startTime  开始时间
 * @property string $endTime  结束时间
 * @property string $consumeWay  消费方式
 * @property string $allCount  所有消费共计
 * @property string $delNum    删除次数(0:正常)
 * @property string $createdTime  表自己的时间(数据创建时间)
 * @property string $updatedTime  表自己的时间
 *
 * @method  static \Illuminate\Database\Eloquent\Builder | \App\Models\BillCount query()
 */
class BillCount extends Model
{
    public $table = 'bill_count';

    const CREATED_AT = 'createdTime';
    const UPDATED_AT = 'updatedTime';
    // public $timestamps = false;
    // public $dateFormat = "Y-m-d";




    public $fillable = [
        'startTime',
        'endTime',
        'consumeWay',
        'allCount',
        'delNum',
        'createdTime',
        'updatedTime',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'startTime' => 'string',
        'endTime' => 'string',
        'consumeWay' => 'string',
        'allCount' => 'string',
        'delNum' => 'string',
        'createdTime' => 'string',
        'updatedTime' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
