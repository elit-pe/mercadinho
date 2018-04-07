<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marketplace extends Model
{
    protected $fillable = [
        'id', 'name', 'owner_id', 'active',
    ];

    protected $hidden = ['owner_id','created_at','updated_at'];

    public function owner()
    {
        return $this->belongsTo('App\Owner');
    }

    public function addresses()
    {
        return $this->belongsToMany('App\Address', 'address_marketplace', 'marketplace_id', 'postal_code');
    }
}
