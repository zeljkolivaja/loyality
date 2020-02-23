<?php

namespace App\Http\Controllers;

use App\Venue;
use App\User;
use App\Reward;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $venues = $user->venues;

        return view('venues.home', compact('venues'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('venues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $venue = new Venue;
        $venue->addVenue($this->validateVenue());
        return redirect('/admins');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        $id = $venue->id;
        $reward = Reward::where('venue_id', $id)->get();
        $this->authorize('view', $venue);
        return view('venues.show', compact('venue', 'reward'));
    }

    /**
     * Show the form for editing the specified resource.
     *
      * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venue)
    {
        $this->authorize('view', $venue);
        return view('venues.edit', compact('venue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Venue $venue)
    {
        $this->authorize('view', $venue);
        $venue->update($this->validateVenue());
        session()->flash('message', 'Vaša poslovnica je ažurirana.');
        return redirect('/admins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        $this->authorize('view', $venue);
        $venue->delete();
        session()->flash('message', 'Poslovnica je obrisana.');
        return redirect('/admins');
    }

    protected function validateVenue()
    {
        return request()->validate([
            'name' => 'required', 'min:3',
            'adress' => 'required|min:3',
            'telephone' => 'required|min:3',
            'email' => 'required|min:3'
        ]);
    }


    public function stats(Venue $venue, User $user)
    {
        $users = $venue->users;

        return view('venues.stats', compact('users'));
    }
}
