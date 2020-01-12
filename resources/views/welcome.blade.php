@extends('layouts.app')

@section('content')

<div class="container">
   <div class="text-center">

      @forelse ($venues as $venue)

      <div class="card" style="width: 25rem;">
        {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
        <div class="card-body">
          <h5 class="card-title">{{$venue->venueName}}</h5>
          <p class="card-text">Skupljene bodove izmjenite za nagrade u poslovnici :) </p>
        </div>
        <ul class="list-group list-group-flush">
         @forelse ($venue->rewards as $reward)

          <li class="list-group-item">

            <div class="progress  position-relative" style="width: 100%; height: 30px">
                <div class="progress-bar @if ($venue->points >= $reward->reward_points) {{"bg-success"}} @endif"
                   role="progressbar" role="progressbar"
                   style="width: {{$venue->points / $reward->reward_points * 100}}%"
                   aria-valuenow="{{$venue->points / $reward->reward_points * 100}}" aria-valuemin="0"
                   aria-valuemax="100">
                </div>
                <small class="justify-content-center d-flex align-self-center position-absolute w-100">@if ($venue->points >=
                   $reward->reward_points)
                  <b> Čestitamo, imate dovoljno bodova za : {{$reward->name}} :) </b>
                   @else
                   <b> {{$reward->name}} </b>
                   @endif</small>
             </div>

          </li>
          @empty


          @endforelse

          {{-- <li class="list-group-item">Dapibus ac facilisis in</li>
          <li class="list-group-item">Vestibulum at eros</li> --}}
        </ul>
        <div class="card-body">
          <a href="/venues/{{$venue->id}}/news" class="card-link">{{$venue->venueName}} Promocije i novosti</a>
          {{-- <a href="#" class="card-link">Another link</a> --}}
        </div>
      </div>
      <br>



      @empty
      Nemate bodova

      @endforelse
   </div>
</div>

@endsection
