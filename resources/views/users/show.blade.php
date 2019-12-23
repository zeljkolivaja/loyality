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
     <input type="submit" value="Dodaj Bodove">
    </form>


@endsection
