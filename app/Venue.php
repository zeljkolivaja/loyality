<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $guarded = [];


    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('user_id', 'points');
    }

    public function rewards()
    {
        return $this->hasMany('App\Reward');
    }

    public function news()
    {
        return $this->hasMany('App\News');
    }

    public function archives()
    {
        return $this->hasMany('App\Archive');
    }


    public function addReward($reward)
    {
        $this->rewards()->create($reward);
    }

    public function addVenue($venue)
    {
        $venue = $this->create($venue);
        $user = auth()->user();
        $user->venues()->attach($venue->id, [
            'admin' => 0
          ]);
    }

    public function addNews($news)
    {
        $this->news()->create($news);
    }
}
