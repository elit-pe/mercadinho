<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'installment', 'amount', 'payment_type', 'status'];

    public function marketplaces()
    {
        return $this->belongsToMany('App\Marketplace');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function user()
    {
        return  $this->belongsTo('App\User');
    }
}
