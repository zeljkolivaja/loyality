@extends('layouts.app')
@section('content')

<div class="container">
    <div class = "text-center">
   <a href="{{ url('/admins') }}" class="btn btn-secondary">Povratak</a>
</div>
 <br>



<div class="card text-center">
    <div class="card-header">
      Upravljanje korisnikom
    </div>
    <div class="card-body">
      <h5 class="card-title"><h1> {{$user->name}}</h1>
      <p class="card-text">{{$user->email}}</p>
      <p class="card-text"> <h1> <span> Ukupni bodovi :  <text style="color:#ffcf40;">  {{$points}}</text> </span></h1> </p>



      <form action="/users/{{$user->id}}" method="post">
        @csrf
        {{ method_field('PATCH') }}
         {{-- <input type="number" name="pointsAdd" value="{{$points}}" placeholder="{{$points}}"  id=""> --}}
         <input type="number" name="pointsAdd" value="0"  id="">
         <input type="hidden" name="venueId" value="{{$venue_id}}" id="">
         <input type="submit" class="btn btn-secondary"  value="Dodaj Bodove">
        </form>

    </div>
    <div class="card-footer text-muted">
        Ukoliko ste prilikom dodavanja bodova pogriješili bodove možete ručno oduzeti dodavanjem minusa, npr -25
    </div>
  </div>

<br>
<br>

<div class = "text-center"><h1>Popis nagrada</h1></div>
<br>

    @if ($rewards != null)

    <div class = "text-center">
    <div class="row">

    @foreach ($rewards as $reward)
    <div class="col-lg-4">


    <b> Nagrada : </b> {{$reward->name}}
    <br>

    <b> Vrijednost nagrade : </b> {{$reward->reward_points}}

    <div>
      <form action="/users/{{$user->id}}" method="post">
      @csrf
      {{ method_field('PATCH') }}
       <input type="hidden" name="pointsAdd" value="{{-$reward->reward_points}}" placeholder="{{$points}}"  id="">
       <input type="hidden" name="venueId" value="{{$venue_id}}" id="">
       <input type="submit" class="btn btn-secondary"  {{  $reward->reward_points > $points ? "disabled "  : ""  }}
       value=" {{  $reward->reward_points > $points ? "Nedovoljno bodova "  : "Dodijeli nagradu"  }}">
      </form>
  </div>
  <br/>
    </div>


    @endforeach

</div>
</div>

    @else
        Nemate unešenih nagrada
    @endif


@endsection
