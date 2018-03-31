<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Marketplace;

class MarketplacesQuery extends Query
{
    protected $attributes = [
        'name' => 'Marketplaces',
        'description' => 'query for list of Marketplaces'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Marketplace'));
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
            'active' => [
                'type' => Type::boolean()
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $query = Marketplace::query();
        foreach ($args as $key => $value) {
            $query->whereIn($key, [$value]);
        }

        return $query->get();
    }
}
