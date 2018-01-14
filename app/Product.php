<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','price'];

    protected $hidden = ['updated_at','created_at'];
}
