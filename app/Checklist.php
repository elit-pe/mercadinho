<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $fillable = ['name','observation','public'];

    protected $hidden = ['created_at','updated_at', 'product_id'];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
