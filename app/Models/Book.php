<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Pre
 * @property integer $id
 * @property string $name
 * @property string $price
 * @property string $author
 * @property integer $num_add
 * @property integer $create_time
 *
 * @method  static \Illuminate\Database\Eloquent\Builder | \App\Models\Book query()
 */
class Book extends Model
{

    public $table = 'book';
    
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    // public $timestamps = false;
    // public $dateFormat = "Y-m-d";




    public $fillable = [
        'name',
        'price',
        'author',
        'num_add',
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
        'name' => 'string',
        'price' => 'string',
        'author' => 'string',
        'num_add' => 'integer',
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
