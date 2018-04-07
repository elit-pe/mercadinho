<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['client_id', 'number', 'name', 'type'];

    public function client()
    {
        return $this->belongsTo('App\User');
    }
}
