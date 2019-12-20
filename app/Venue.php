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

    
    public function addReward($reward)
    {
        $this->rewards()->create($reward);
    }




}
