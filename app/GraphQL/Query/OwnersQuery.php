<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Owner;

class OwnersQuery extends Query
{
    protected $attributes = [
        'name' => 'Owners',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Owner'));
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::id()
            ],
            'name' => [
                'type' => Type::string()
            ],
            'cpf' => [
                'type' => Type::string()
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $query = Owner::query();
        foreach ($args as $key => $value) {
            $query->whereIn($key, [$value]);
        }
        return $query->get();
    }
}
