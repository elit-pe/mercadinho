<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name','surname','birthdate'];

    protected $hidden = ['id','user_id','created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
