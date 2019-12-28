@extends('layouts.app')
@section('content')

<div class="container">
   <a href="{{ url('/admins') }}">Povratak</a>
 <br>

 Korisnik : {{$getUser->name}}


<br>

Ukupni bodovi korisnika : {{$points}}


<form action="/users/{{$getUser->id}}" method="post">
    @csrf
    {{ method_field('PATCH') }}
     <input type="number" name="pointsAdd" value="{{$points}}" placeholder="{{$points}}"  id="">
     <input type="hidden" name="venueId" value="{{$venue_id}}" id="">
     <input type="submit" value="Ažuriraj Bodove">
    </form>
    Ukoliko bodove želite oduzeti ručno, jednostavno prilikom unosa bodova dodajte -
    npr -100


<br>
<br>


    @if ($rewards != null)
    @foreach ($rewards as $reward)

    Nagrada : {{$reward->name}}
    <br>
    Vrijednost nagrade : {{$reward->reward_points}}

    <div>
      <form action="/users/{{$getUser->id}}" method="post">
      @csrf
      {{ method_field('PATCH') }}
       <input type="hidden" name="pointsAdd" value="{{-$reward->reward_points}}" placeholder="{{$points}}"  id="">
       <input type="hidden" name="venueId" value="{{$venue_id}}" id="">
       <input type="submit"  {{  $reward->reward_points > $points ? "disabled "  : ""  }}
       value=" {{  $reward->reward_points > $points ? "Nedovoljno bodova "  : "Dodijeli nagradu"  }}">
      </form>
  </div>


    @endforeach

    @else
        Nemate unešenih nagrada
    @endif


@endsection
