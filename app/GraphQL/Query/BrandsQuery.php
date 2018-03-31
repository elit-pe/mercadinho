<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Brand;

class BrandsQuery extends Query
{
    protected $attributes = [
        'name' => 'Brands',
        'description' => 'Return list of brands'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Brand'));
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
            'description' => [
                'type' => Type::string()
            ],
            'created_at' => [
                'type' => Type::string()
            ],
            'updated_at' => [
                'type' => Type::string()
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $query = Brand::query();
        foreach ($args as $key => $value) {
            $query->whereIn($key, [$value]);
        }
        $brands = $query->get();
        return $brands;
    }
}
