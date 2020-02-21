<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class VisitorController extends Controller
{
    public function index()
    {


        $user = auth()->user();

        if (Auth::check()) {
            $venues = $user->venues;
        }else
        {
            $venues = null;
        }

         return view('welcome', compact('venues'));

    }
}
