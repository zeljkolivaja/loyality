<?php

namespace App\Policies;

use App\User;
use App\Venue;
use Illuminate\Auth\Access\HandlesAuthorization;

class VenuePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any venues.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the venue.
     *
     * @param  \App\User  $user
     * @param  \App\Venue  $venue
     * @return mixed
     */
    public function view(User $user, Venue $venue)
    {

       $user = auth()->user();

       if($user->venues->find($venue->id) != null &&  $user->venues->find($venue->id)->getOriginal('pivot_admin') == 0 ) {
        $user_venue = 0;
       } else {
        $user_venue = 1;
       }

       return $user_venue == 0;



    //    $venueOwner = $venue->users[0]->getOriginal('pivot_user_id');
    //    return $venueOwner == $user->id;

    }

    /**
     * Determine whether the user can create venues.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the venue.
     *
     * @param  \App\User  $user
     * @param  \App\Venue  $venue
     * @return mixed
     */
    public function update(User $user, Venue $venue)
    {
        //
    }

    /**
     * Determine whether the user can delete the venue.
     *
     * @param  \App\User  $user
     * @param  \App\Venue  $venue
     * @return mixed
     */
    public function delete(User $user, Venue $venue)
    {
        //
    }

    /**
     * Determine whether the user can restore the venue.
     *
     * @param  \App\User  $user
     * @param  \App\Venue  $venue
     * @return mixed
     */
    public function restore(User $user, Venue $venue)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the venue.
     *
     * @param  \App\User  $user
     * @param  \App\Venue  $venue
     * @return mixed
     */
    public function forceDelete(User $user, Venue $venue)
    {
        //
    }
}
