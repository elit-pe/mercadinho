<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Address;

class AddressQuery extends Query
{
    protected $attributes = [
        'name' => 'addresses',
        'description' => 'Return list of addresses'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Address'));
    }

    public function args()
    {
        return [
            'postal_code' => [
                'type' => Type::nonNull(Type::string())
            ],
            'street' => [
                'type' => Type::string()
            ],
            'district' => [
                'type' => Type::string()
            ],
            'city' => [
                'type' => Type::string()
            ],
            'state' => [
                'type' => Type::string()
            ],
            'created_at' => [
                'type' =>  Type::string()
            ],
            'updated_at' => [
                'type' =>  Type::string()
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $query = Address::query();
        foreach ($args as $key => $value) {
            $query->whereIn($key, [$value]);
        }
        $address = $query->get();
        return $address;
    }
}
