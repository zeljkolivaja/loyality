@extends('layouts.app')
@section('content')


<div class="container">
  <div class="text-center">

    <a href="{{ url('/admins') }}">Povratak</a>
    <br>

    <br>

    @if (session('message'))
    <p>{{ session('message') }}</p>
    @endif

    Pronađi korisnika
    <form action="/users" method="get">
      <input type="search" name="name" placeholder="Korisničko ime" id="">
      <input type="hidden" name="venue_id" value="{{$venue->id}}" id="">
      <input type="submit" value="Pretraga">
    </form>

    <br>

    <div>
      <div>
        <a href="/admins/{{$venue->id}}/edit">Ažuriraj podatke poslovnice</a>
        <li>{{ $venue->name }}</li>
        <li>{{ $venue->adress }}</li>
        <li>{{ $venue->telephone }}</li>
        <li>{{ $venue->email }}</li>
        <br>

        <h4>Dodaj novu nagradu</h4>


        <form action="/rewards/{{$venue->id}}" method="post">
          @csrf
          <input type="text" name="name" placeholder="Naziv nagrade" id="">
          <input type="text" name="image" placeholder="Slika" id="">
          <input type="number" min="0" name="reward_points" placeholder="Vrijednost nagrade" id="">
          <input type="date" name="expiration_date" placeholder="Datum isteka nagrade" id="">

          <input type="submit" value="Kreiraj Nagradu">
        </form>
      </div>



      <br>
      <h4>Popis nagrada</h4>
      @forelse ($reward as $rewards)
      <div>
        <div>
          <a href="/rewards/{{ $rewards->id}}/edit">Editiraj nagradu</a>
          
          <li>Ime nagrade : {{ $rewards->name }}</li>
          <li>Vrijednost nagrade : {{ $rewards->reward_points }}</li>
          <li>Datum isteka ponude : {{ $rewards->reward_points }}</li>
         

          <form method="POST" action="/rewards/{{ $rewards->id }}">
            @method('DELETE')
            @csrf

            <input type="submit" value="Obriši nagradu">
          </form>



          <br>
        </div>
        @empty
        <p>Nemate Nagrada</p>
        @endforelse



      </div>
    </div>

    @endsection