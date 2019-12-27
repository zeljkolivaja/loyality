@extends('layouts.app')
@section('content')

<div class="container">
   <a href="{{ url('/admins') }}">Povratak</a>
 <br>

  <div>
   <div>
    <form action="/admins/{{$venue->id}}" method="post">
      @csrf
      {{ method_field('PATCH') }}
      <input type="text" name="name" value="{{$venue->name}}" id="">
      <input type="text" name="adress" value="{{$venue->adress}}"  id="">
      <input type="email" name="email" value="{{$venue->email}}"  id="">
      <input type="number"  min="0" name="telephone" value="{{$venue->telephone}}"  id="">
      <input type="submit" value="Ažuriraj Poslovnicu">
      </form>
      <br>
    </div>



    <form class="form-inline justify-content-center" action="/admins/{{$venue->id}}" method="post">
        @csrf
        {{ method_field('PATCH') }}

        <input type="text" class="form-control" name="name" aria-describedby="naziv nagrade"
        value="{{$venue->name}}">
        <input type="text" class="form-control" name="image" min="0" aria-describedby="Slika"
            placeholder="Slika">
        <input type="number" class="form-control" name="reward_points" aria-describedby="Vrijednost nagrade"
            placeholder="Vrijednost nagrade">
        <input type="date" class="form-control" name="expiration_date"
            aria-describedby="Datum isteka nagrade" placeholder="Datum isteka nagrade">

        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Kreiraj nagradu</button>
    </form>







 <br>
</div>





@endsection
