<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Product;

class ProductsQuery extends Query
{
    protected $attributes = [
        'name' => 'Products',
        'description' => 'Return list of product'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Product'));
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
            'price' => [
                'type' => Type::float()
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $query = Product::query();
        foreach ($args as $key => $value) {
            $query->whereIn($key, [$value]);
        }
        $product = $query->get();
        return $product;
    }
}
