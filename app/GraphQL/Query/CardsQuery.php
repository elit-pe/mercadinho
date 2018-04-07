<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Card;

class CardsQuery extends Query
{
    protected $attributes = [
        'name' => 'Cards',
        'description' => 'A Card query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Card'));
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::id()
            ],
            'number' => [
                'type' => Type::string()
            ], 
            'name' => [
                'type' => Type::string()
            ], 
            'type' => [
                'type' => Type::string()
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $query = Card::query();
        foreach ($args as $key => $value) {
            $query->whereIn($key, [$value]);
        }
        $card = $query->get();
        return $card;
    }
}
