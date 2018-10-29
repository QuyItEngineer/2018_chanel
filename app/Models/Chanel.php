<?php

namespace App\Models;

use App\Observers\RecordFingerPrintTrait;
use Eloquent as Model;

/**
 * Class Chanel
 * @package App\Models
 * @version October 28, 2018, 4:13 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string image
 * @property string name
 * @property string description
 * @property string video_url
 * @property integer category_id
 * @property integer created_by
 * @property integer updated_by
 */
class Chanel extends Model
{
    use RecordFingerPrintTrait;

    public $table = 'chanels';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id',
        'image',
        'name',
        'description',
        'video_url',
        'category_id',
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
        'image' => 'string',
        'name' => 'string',
        'description' => 'string',
        'video_url' => 'string',
        'category_id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'image' => 'required',
        'video_url' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
