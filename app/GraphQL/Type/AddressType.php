<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class AddressType extends BaseType
{
    protected $attributes = [
        'name' => 'Address',
        'description' => 'A address type'
    ];

    public function fields()
    {
        return [
            'postal_code' => [
                'type' => Type::nonNull(Type::string())
            ],
            'street' => [
                'type' => Type::nonNull(Type::string())
            ],
            'district' => [
                'type' => Type::nonNull(Type::string())
            ],
            'city' => [
                'type' => Type::nonNull(Type::string())
            ],
            'state' => [
                'type' => Type::nonNull(Type::string())
            ],
            'created_at' => [
                'type' =>  Type::nonNull(Type::string())
            ],
            'updated_at' => [
                'type' =>  Type::nonNull(Type::string())
            ],
            'user' => [
                'type' => GraphQL::type('User')
            ],
            'marketplace' => [
                'type' => Type::listOf(GraphQL::type('Marketplace'))
            ]
        ];
    }

    public function resolveUserField($root, $args)
    {
        $all = $root->Users;
        $retorno = null;
        if(!empty($all))
        {
            $retorno = array();
            foreach ($all as $value) {
                $retorno[] = $value;
            }
        }
        return $retorno;
    }

    public function resolveMarketplaceField($root, $args)
    {
        $all = $root->MarketPlaces;
        $retorno = null;
        if(!empty($all))
        {
            $retorno = array();
            foreach ($all as $value) {
                $retorno[] = $value;
            }
        }
        return $retorno;
    }
}
