<?php

namespace App\Repositories;

use App\Models\Chanel;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ChanelRepository
 * @package App\Repositories
 * @version October 28, 2018, 4:13 pm UTC
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
        'sub_category_id',
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
