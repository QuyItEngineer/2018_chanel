<?php

namespace App\Models;

use App\Observers\RecordFingerPrintTrait;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SubCategory
 * @package App\Models
 * @version March 8, 2019, 8:14 am UTC
 *
 * @property \App\Models\Category category
 * @property \Illuminate\Database\Eloquent\Collection Chanel
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string title
 * @property string description
 * @property integer category_id
 * @property integer created_by
 * @property integer updated_by
 */
class SubCategory extends Model
{
    use RecordFingerPrintTrait;

    public $table = 'sub_categories';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'description',
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
        'title' => 'string',
        'description' => 'string',
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
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function chanels()
    {
        return $this->hasMany(\App\Models\Chanel::class);
    }
}
