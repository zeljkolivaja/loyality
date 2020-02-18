<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Venue;
use App\Archive;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request, User $user)
    {
        //find user
        $searchInput = $request->name;
        $users = $user->searchUser('%' . $searchInput . '%');

        //take our venue id
        $venue_id = ($request->venue_id);
        return view('users.index', compact('users', 'venue_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Venue $venue, Request $request)
    {
        $venue_id = $venue->id;

        // find the single venue we wish to fetch
        $userVenuePivot = $user->venues->find($venue->id);

        //check if the user have any points for selected venue, if not default $points to 0 points

        if ($userVenuePivot == null) {
            $points = "0";
        } else {
            $points = $userVenuePivot->getOriginal('pivot_points');
        }

        //fetch the rewards for selected venue
        if (isset($userVenuePivot->rewards)) {
            $rewards = $userVenuePivot->rewards;
        } else {
            $rewards = null;
        }

        return view('users.show', compact('user', 'points', 'venue_id', 'rewards'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Archive $archive, Request $request)
    {
        //request the id of the venue we wish to update
        //request the points we wisth to add to it
        $venue_id = $request->venueId;
        $points = $request->pointsAdd;

        //find the USERS venue we wish to update by its id

        if ($user->venues->find($venue_id) == null) {
            $user->refresh();
        }



        //get the id of the venue pivot table we wish to update
        if (!$user->venues->contains($venue_id)) {

            $user->venues()->attach($venue_id);
            $user->refresh();
        }

        $venue = $user->venues->find((int) $venue_id);

        $id = $venue->getOriginal('pivot_id');

        // check if the total user points whent to negative, if they do abort
        $check = $venue->getOriginal('pivot_points') + $points;

        if ($check < 0) {
            return "points cannot go to negative";
        }

        // add the new points to existing ones
        $totalPoints = $venue->getOriginal('pivot_points') + $points;

        // update the join user_venue table with the new total points status
        if ($user->venues->find($venue_id) == null) {
            DB::table('user_venue')->where('id', $id)->store(array('points' => "$totalPoints"));
        } else {
            DB::table('user_venue')->where('id', $id)->update(array('points' => "$totalPoints"));
        }

        // $archive = new Archive;
        // $archive->used_points = $points;
        // $venue->archives()->save($archive);

        session()->flash('message', 'Bodovi korisnika ' . $user->name .  ' uspješno ažurirani. Novo stanje bodova: ' . $totalPoints);

        return redirect('/admins/' . $venue_id . '/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
