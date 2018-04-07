<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Client;

class ClientsQuery extends Query
{
    protected $attributes = [
        'name' => 'Clients',
        'description' => 'A clients query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Client'));
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
            'surname' => [
                'type' => Type::string()
            ],
            'birthdate' => [
                'type' => Type::string()
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $query = Client::query();
        foreach ($args as $key => $value) {
            $query->whereIn($key, [$value]);
        }

        return $query->get();
    }
}
