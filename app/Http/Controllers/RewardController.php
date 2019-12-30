<?php

namespace App\Http\Controllers;

use App\Reward;
use App\Venue;

use Illuminate\Http\Request;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Venue $venue)
    {
        $this->authorize('view', $venue);

         return view('rewards.create', compact('venue'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Venue $venue, Request $request)
    {
        $this->authorize('view', $venue);

        $reward = $this->validateReward();
        $venue->addReward($reward);

        session()->flash('message', 'Vaša nagrada je dodana.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reward $reward)
    {
        // $this->authorize('view', $venue);

         return view('rewards.edit', compact('reward'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Reward $reward, Request $request)
    {
        // $this->authorize('view', $venue);

        $reward->update($this->validateReward());
        session()->flash('message', 'Vaša nagrada je ažurirana.');
        return redirect('/admins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reward $reward)
    {
        // $this->authorize('view', $venue);

        $reward->delete();
        session()->flash('message', 'Nagrada je obrisana.');
        return back();
    }


    protected function validateReward()
    {
        return request()->validate([
            'name' => 'required', 'min:3',
            'reward_points' => 'required|min:2',
            'expiration_date' => 'required',
            'image' => 'required'

        ]);
    }
}
