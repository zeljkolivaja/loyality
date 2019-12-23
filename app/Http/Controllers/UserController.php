<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
    public function show(Request $request, User $user)
    {

        // find the user
        $getUser = $user->find($request->id);

        // get the id of selected venue

        $venue_id = $request->venueId;

        // find the single venue we wish to fetch
        $venue = $getUser->venues->find($venue_id);

        //check if the user have any points for selected venue, if not default $points placeholder to 0 points
        if ($venue == null) {
            $points = "0";
        } else {
            $points = $venue->getOriginal('pivot_points');
        }

        return view('users.show', compact('getUser', 'points', 'venue_id'));
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
    public function update(User $user, Request $request)
    {
        //request the id of the venue we wish to update
        //request the points we wisth to add to it
        $venue_id = $request->venueId;
        $points = $request->pointsAdd;

        //find the USERS venue we wish to update by its id


        if($user->venues->find($venue_id) == null){
             $user->venues()->attach($venue_id);
             $venue = $user->venues->find($venue_id);
             $venue->refresh();

        }

        $venue = $user->venues->find($venue_id);



        //get the id of the venue we wish to update
        $id = $venue->getOriginal('pivot_id');

        // add the new points to existing ones
        $totalPoints = $venue->getOriginal('pivot_points') + $points;


        // update the join user_venue table with the new total points status
        DB::table('user_venue')->where('id', $id)->update(array('points' => "$totalPoints"));

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
