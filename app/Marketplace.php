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
}
