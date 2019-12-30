<?php

namespace App\Http\Controllers;

use App\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
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
    public function store(Venue $venue, Request $request)
    {
        $reward = $this->validateReward();

        $venue->addReward($reward);

        session()->flash('message', 'Vaša nagrada je dodana.');
        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venue $venue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        //
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

    public function createNews(Venue $venue, Request $request)
    {
        return view('venues.createNews', compact('venue'));

    }


    public function news(Venue $venue, Request $request)
    {
        $news = $this->validateNews();

        $venue->addNews($news);

        session()->flash('message', 'Vaša vijest je dodana.');
        return back();
    }



    public function showNews(Venue $venue, Request $request)
    {
        $news = $venue->news;
        return view('venues.news', compact('news'));

    }

    public function info(Venue $venue, Request $request)
    {
         return view('venues.info', compact('venue'));

    }



    protected function validateNews()
    {
        return request()->validate([
            'name' => 'required', 'min:3',
            'body' => 'required|min:10'
        ]);
    }
}
