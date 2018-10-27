<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SocialAccount
 * @package App\Models
 * @version June 15, 2018, 2:42 am UTC
 *
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection chapters
 * @property \Illuminate\Database\Eloquent\Collection postStories
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property integer user_id
 * @property string provider
 * @property string provider_id
 */
class SocialAccount extends Model
{

    public $table = 'social_accounts';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'user_id',
        'provider',
        'provider_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'provider' => 'string',
        'provider_id' => 'string'
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
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
