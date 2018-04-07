<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class ClientType extends BaseType
{
    protected $attributes = [
        'name' => 'Client',
        'description' => 'A Client type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id())
            ],
            'name' => [
                'type' => Type::nonNull(Type::string())
            ],
            'surname' => [
                'type' => Type::nonNull(Type::string())
            ],
            'birthdate' => [
                'type' => Type::nonNull(Type::string())
            ],
            'user' => [
                'type' => GraphQL::type('User')
            ],
        ];
    }

    public function resolveUserField($root, $args)
    {
        return $root->user;
    }
}
