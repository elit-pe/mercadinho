<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class ProductType extends BaseType
{
    protected $attributes = [
        'name' => 'Product',
        'description' => 'Product type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id())
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Product name'
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'A brief description about the product'
            ],
            'price' => [
                'type' => Type::nonNull(Type::float()),
                'description' => 'Product price'
            ],
            'active' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Status product'
            ],
            'brand' => [
                'args' => [
                    'id' => [
                        'type' => Type::id(),
                        'description' => 'Id of the brand'
                    ],
                ],
                'type' => GraphQL::type('Brand')
            ]
        ];
    }
}
