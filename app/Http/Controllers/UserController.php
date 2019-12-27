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

        //fetch the rewards for selected venuue
        $rewards = $venue->rewards;

        return view('users.show', compact('getUser', 'points', 'venue_id', 'rewards'));
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
            $user->venues()->attach($venue_id);
            $user->refresh();
            $venue = $user->venues->find($venue_id);
            $venue->refresh();
        }

        $venue = $user->venues->find($venue_id);



        //get the id of the venue we wish to update
        $id = $venue->getOriginal('pivot_id');


        // check if the total user points whent to negative, if they do abort
        $check = $venue->getOriginal('pivot_points') + $points;

        if ($check < 0) {

            return "ne zajebavaj";
        }
         // add the new points to existing ones
        $totalPoints = $venue->getOriginal('pivot_points') + $points;


        // update the join user_venue table with the new total points status
        DB::table('user_venue')->where('id', $id)->update(array('points' => "$totalPoints"));


        // check does the user have any used points in archives table, and are the points negative(giving him award)
        // if its true update archive table, if not create a new record in archive table and add points there
        // if ($points < 0 && isset($user->venues->find($venue_id)->archives[0]["id"])) {
        //     $points = ltrim($points, '-');
        //     $updateArchive = $archive->find($user->venues->find($venue_id)->archives[0]["id"]);
        //     $archiveModel = $archive->find($user->venues->find($venue_id)->archives[0]["id"]);
        //     $totalArchivePoints = $archiveModel->used_points + $points;
        //     $archiveModel->update(["used_points" => $totalArchivePoints]);
        // } else {

        // $points = ltrim($points, '-');

        $archive = new Archive;
        $archive->used_points = $points;
        $venue->archives()->save($archive);
        // }

        //https://stackoverflow.com/questions/27828476/laravel-save-one-to-many-relationship



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

    public function stats(Venue $venue, User $user, Archive $archive)
    {

        // $data = Venue::where('id',1)->with('users', 'archives')->get();



    //    $data =  $archive->find(6);


    //     $data = $archive->hasManyThrough('App\User', 'App\Venue');



    //    dd($data);

       return view('venues/stats', compact('data'));


        // $data = $user->venues->find($venue->id)->archives;


    }
}
