<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = ['name','cpf'];

    protected $hidden = ['user_id','created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
