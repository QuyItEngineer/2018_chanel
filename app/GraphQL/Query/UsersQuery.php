<?php

namespace App\GraphQL\Query;

use App\Models\User;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class UsersQuery extends Query
{
    protected $attributes = [
        'name' => 'UsersQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return GraphQL::paginate('user');
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string()
            ],
            'limit' => [
                'name' => 'limit',
                'type' => Type::int()
            ],
            'page' => [
                'name' => 'page',
                'type' => Type::int()
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id', $args['id']);
            }
            if (isset($args['email'])) {
                $query->where('email', $args['email']);
            }
        };
        $limit = 10;
        $page = 0;
        if (isset($args['limit'])) {
            $limit = $args['limit'];
        }
        if (isset($args['page'])) {
            $page = $args['page'];
        }

        $user = User::with(array_keys($fields->getRelations()))
            ->where($where)
            ->select($fields->getSelect())
            ->paginate($limit, ['*'], 'page', $page);
        return $user;
    }
}
