<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Goods
 * @property integer $id
 * @property string $classroomName
 * @property string $startDate
 * @property string $endDate
 * @property string $status
 * @property string $location
 * @property string $selB
 * @property string $selC
 * @property string $selD
 * @property string $selE
 * @property string $answer
 *
 * @method  static \Illuminate\Database\Eloquent\Builder | \App\Models\CalendarData query()
 */
class CalendarData extends Model
{

    public $table = 'calendar_data';

    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';



    public $fillable = [
        'classroomName',
        'startDate',
        'endDate',
        'status',
        'location',
        'selB',
        'selC',
        'selD',
        'selE',
        'answer'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'classroomName' => 'string',
        'startDate' => 'string',
        'endDate' => 'string',
        'status' => 'string',
        'location' => 'string',
        'selB' => 'string',
        'selC' => 'string',
        'selD' => 'string',
        'selE' => 'string',
        'answer' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required'
    ];


}
