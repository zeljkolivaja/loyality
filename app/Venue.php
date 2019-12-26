<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $guarded = [];


    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('user_id');
    }

    public function rewards()
    {
        return $this->hasMany('App\Reward');
    }

    public function archives()
    {
        return $this->hasMany('App\Archive');
    }


    public function addReward($reward)
    {
        $this->rewards()->create($reward);
    }
}
