@extends('layouts.app')

@section('content')

<div class="container">
   <div class="text-center">

      @forelse ($venues as $venue)
      <div>
         <ul class="list-unstyled">
            <li> Ime poslovnice :  {{$venue->venueName}}</li>
            <li>Ukupno stanje bodova :  {{$venue->points}}</li>
         </ul>
         <b> Dostupne nagrade </b> 

         @forelse ($venue->rewards as $reward)
         <div>
            <br>

            <div class="progress  position-relative" style="width: 50%; height: 20px">
               <div class="progress-bar @if ($venue->points > $reward->reward_points) {{"bg-success"}} @endif"
                  role="progressbar" role="progressbar"
                  style="width: {{$venue->points / $reward->reward_points * 100}}%"
                  aria-valuenow="{{$venue->points / $reward->reward_points * 100}}" aria-valuemin="0"
                  aria-valuemax="100">
               </div>
               <small class="justify-content-center d-flex position-absolute w-100">@if ($venue->points >
                  $reward->reward_points)
                  Čestitamo, zamjenit bodove za : {{$reward->name}} :)
                  @else
                  {{$reward->name}}
                  @endif</small>
            </div>
         </div>
         @empty

         @endforelse
      </div>
      <br>


      @empty
      Nemate bodova

      @endforelse
   </div>
</div>

@endsection