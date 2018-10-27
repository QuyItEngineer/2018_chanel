<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

/**
 * Class UserTransformer.
 *
 * @package namespace App\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * Transform the User entity.
     *
     * @param \App\Models\User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id' => (int)$model->id,

            'username' => $model->username,
            'full_name' => $model->full_name,
            'address' => $model->address,
            'phone' => $model->phone,

            'roles' => $model->getRoleNames(),

            'store' => $model->stores,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
