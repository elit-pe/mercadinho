<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class UserType extends BaseType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int())
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'User name'
            ],
            'email' => [
                'type' => Type::nonNull(Type::string())
            ],
            'created_at' => [
                'type' => Type::string()
            ],
            'udpdated_at' => [
                'type' => Type::string()
            ],
        ];
    }
}
