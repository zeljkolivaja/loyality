@extends('layouts.app')
@section('content')

<div class="container">
   <a href="{{ url('/admins') }}">Povratak</a>
 <br>

  <div>
   <div>
    <form action="/rewards/{{$reward->id}}" method="post">
      @csrf
      {{ method_field('PATCH') }}
      <label for="name">Naziv nagrade</label>
      <input type="text" name="name" value="{{$reward->name}}" id="">

      <label for="image">Slika nagrade</label>
      <input type="text" name="image" value="{{$reward->image}}"  id="">

      <label for="image">Vrijednost nagrade u bodovima</label>
      <input type="text" name="reward_points" value="{{$reward->reward_points}}"  id="">

      <label for="image">Datum trajanja</label>
      <input type="date" name="expiration_date" value="{{$reward->expiration_date}}"  id="">
      <input type="submit" value="Ažuriraj nagradu">

      </form>
      <br>
    </div>
 <br>
</div>





@endsection
