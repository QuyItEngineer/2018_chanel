<?php

namespace App\Repositories;

use App\Models\SubCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SubCategoryRepository
 * @package App\Repositories
 * @version March 8, 2019, 8:14 am UTC
 *
 * @method SubCategory findWithoutFail($id, $columns = ['*'])
 * @method SubCategory find($id, $columns = ['*'])
 * @method SubCategory first($columns = ['*'])
*/
class SubCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'category_id',
        'created_by',
        'updated_by'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SubCategory::class;
    }
}
