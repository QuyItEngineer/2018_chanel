<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\UserDetail
 *
 * @property int $id
 * @property int $user_id
 * @property string $company
 * @property string $vat_number
 * @property string $phone
 * @property string $website
 * @property string $currency
 * @property string $language
 * @property string $address
 * @property string $state
 * @property string $zip_code
 * @property string $country
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \App\Models\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserDetail onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereVatNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserDetail whereZipCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserDetail withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserDetail withoutTrashed()
 * @mixin \Eloquent
 */
class UserDetail extends Model
{
    use SoftDeletes;

    public $table = 'user_details';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'company',
        'vat_number',
        'phone',
        'website',
        'currency',
        'language',
        'address',
        'state',
        'zip_code',
        'country'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'company' => 'string',
        'vat_number' => 'string',
        'phone' => 'string',
        'website' => 'string',
        'currency' => 'string',
        'language' => 'string',
        'address' => 'string',
        'state' => 'string',
        'zip_code' => 'string',
        'country' => 'string'
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
