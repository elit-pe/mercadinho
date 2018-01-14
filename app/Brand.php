<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    
    protected $fillable = ['name','description'];

    protected $guard = ['updated_at','created_at'];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
