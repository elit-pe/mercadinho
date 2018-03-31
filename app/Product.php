<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','price','brand_id'];

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
}
