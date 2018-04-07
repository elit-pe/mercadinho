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
        $all = $root->Users;
        
        if(!empty($all))
        {
            foreach ($all as $value) {
                
                return $value;
                
            }
        }

        return null;
    }
}
