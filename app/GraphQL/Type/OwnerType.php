<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class OwnerType extends BaseType
{
    protected $attributes = [
        'name' => 'Owner',
        'description' => 'Type of Owner of marketplace'
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
            'cpf' => [
                'type' => Type::nonNull(Type::string())
            ],
            'crated_at' => [
                'type' => Type::nonNull(Type::string())
            ],
            'updated_at' => [
                'type' => Type::nonNull(Type::string())
            ],
            'user' => [
                'args' => [
                    'id' => [
                        'type' => Type::id()
                    ],
                ],
                'type' => GraphQL::type('User')
            ]
        ];
    }

    public function resolveUserField($root, $args)
    {
        if(isset($args['id']))
        {
            return $root->user->find($args['id']);
        }

        return $root->user;
    }
}
