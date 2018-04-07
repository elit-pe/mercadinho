<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $primaryKey = 'postal_code';
    protected $fillable = ['postal_code','street','district', 'city', 'state'];

    public function marketplaces()
    {
        return $this->belongsToMany('App\Marketplace', 'address_marketplace', 'postal_code', 'marketplace_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'address_user', 'postal_code', 'user_id');
    }
}
