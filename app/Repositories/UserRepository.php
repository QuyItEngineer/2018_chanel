<?php

namespace App\Repositories;

use App\Models\User;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version March 27, 2018, 4:38 pm UTC
 *
 * @method User findWithoutFail($id, $columns = ['*'])
 * @method User find($id, $columns = ['*'])
 * @method User first($columns = ['*'])
 */
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'username' => 'like',
        'email' => 'like',
        'phone' => 'like',
        'full_name' => 'like',
        'address' => 'like',
        'roles.name' => 'like',
        'stores.name' => 'like'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }

    /**
     * @param string $roleName
     * @return mixed
     */
    public function findByRoleName(string $roleName)
    {
        return parent::whereHas('roles', function ($query) use ($roleName) {
            $query->where('name', $roleName);
        })->get();
    }

}
