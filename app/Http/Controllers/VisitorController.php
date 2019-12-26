<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $venues = $user->venues;

        foreach ($venues as $venue ) {
            //  $data[venue] = $venue->name . $venue->getOriginal('pivot_points') . $venue->rewards;
             $venue->points = $venue->getOriginal('pivot_points');
             $venue->venueName = $venue->name;
         
        }
         return view('welcome', compact('venues'));

    }
}
