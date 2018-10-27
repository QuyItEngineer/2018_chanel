<?php

namespace App\Repositories;

use App\Models\Chanel;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ChanelRepository
 * @package App\Repositories
 * @version October 25, 2018, 1:09 pm UTC
 *
 * @method Chanel findWithoutFail($id, $columns = ['*'])
 * @method Chanel find($id, $columns = ['*'])
 * @method Chanel first($columns = ['*'])
*/
class ChanelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image',
        'name',
        'description',
        'video_url',
        'category_id',
        'created_by',
        'updated_by'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Chanel::class;
    }
}
