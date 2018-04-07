<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class CardType extends BaseType
{
    protected $attributes = [
        'name' => 'Card',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id())
            ],
            'number' => [
                'type' => Type::nonNull(Type::string())
            ], 
            'name' => [
                'type' => Type::nonNull(Type::string())
            ], 
            'type' => [
                'type' => Type::nonNull(Type::string())
            ],
            'client' => [
                'type' => GraphQL::type('Client')
            ]
        ];
    }

    public function resolveClientField($root, $args)
    {
        return $root->client;
    }
}
