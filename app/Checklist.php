<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $fillable = ['product_id','observation','max_price','min_price'];

    protected $hidden = ['created_at','updated_at', 'product_id'];

    public function product()
    {
        return $this->hasOne('App\Product');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
