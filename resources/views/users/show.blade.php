@extends('layouts.app')
@section('content')

<div class="container">
   <a href="{{ url('/admins') }}">Povratak</a>
 <br>

 Korisnik : {{$getUser->name}}


<br>

Ukupni bodovi korisnika : {{$points}}



{{$venue_id}}

<form action="/users/{{$getUser->id}}" method="post">
    @csrf
    {{ method_field('PATCH') }}
     <input type="number" name="pointsAdd" value="{{$points}}" placeholder="Dodaj bodove"  id="">
     <input type="number" name="venueId" value="{{$venue_id}}" placeholder="Venue id"  id="">
     <input type="submit" value="Dodaj Bodove">
    </form>


@endsection
