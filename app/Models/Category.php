<?php

namespace App\Models;

use App\Observers\RecordFingerPrintTrait;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 * @version October 25, 2018, 1:06 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string title
 * @property string url_banner
 * @property string description
 * @property integer created_by
 * @property integer updated_by
 */
class Category extends Model
{
    use RecordFingerPrintTrait;

    public $table = 'categories';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id',
        'title',
        'url_banner',
        'description',
        'created_by',
        'updated_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'url_banner' => 'string',
        'description' => 'string',
        'created_by' => 'integer',
        'updated_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
