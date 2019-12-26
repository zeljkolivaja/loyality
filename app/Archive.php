<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $guarded = [];

    public function venue()
    {
        return $this->belongsTo('App\Venue');
    }

}
