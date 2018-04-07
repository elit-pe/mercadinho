<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['marketplace_id', 'code', 'percent', 'amount'];

    public function marketplace()
    {
        return $this->belongsTo('App\Marketplace');
    }
}
