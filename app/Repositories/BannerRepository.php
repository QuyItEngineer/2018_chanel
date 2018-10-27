<?php

namespace App\Repositories;

use App\Models\Banner;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BannerRepository
 * @package App\Repositories
 * @version October 27, 2018, 5:21 am UTC
 *
 * @method Banner findWithoutFail($id, $columns = ['*'])
 * @method Banner find($id, $columns = ['*'])
 * @method Banner first($columns = ['*'])
*/
class BannerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'url_banner',
        'created_by',
        'updated_by'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Banner::class;
    }
}
