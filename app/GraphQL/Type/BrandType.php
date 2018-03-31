<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class BrandType extends BaseType
{
    protected $attributes = [
        'name' => 'Brand',
        'description' => 'A type'
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
            'description' => [
                'type' => Type::nonNull(Type::string())
            ],
            'created_at' => [
                'type' =>  Type::nonNull(Type::string())
            ],
            'updated_at' => [
                'type' =>  Type::nonNull(Type::string())
            ]
        ];
    }
}
