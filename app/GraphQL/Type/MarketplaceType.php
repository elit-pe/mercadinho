<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class MarketplaceType extends BaseType
{
    protected $attributes = [
        'name' => 'Marketplace',
        'description' => 'A Marketplace type'
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
            'active' => [
                'type' => Type::nonNull(Type::boolean())
            ],
            'crated_at' => [
                'type' => Type::nonNull(Type::string())
            ],
            'updated_at' => [
                'type' => Type::nonNull(Type::string())
            ],
            'owner' => [
                'args' => [
                    'id' => [
                        'type' => Type::id()
                    ],
                ],
                'type' => GraphQL::type('Owner')
            ]
        ];
    }

    public function resolveOwnerField($root, $args)
    {
        if(isset($args['id']))
        {
            return $root->owner->find($args['id']);
        }

        return $root->owner;
    }
}
