@extends('layouts.app')
@section('content')
 
<div class="container">
   <a href="{{ url('/admins') }}">Povratak</a> 
 <br>

  <div>
   <div>
      <a href="/admins/{{$venue->id}}/edit">Editiraj poslovnicu</a>
      <li>{{ $venue->name }}</li>
      <li>{{ $venue->adress }}</li>
      <li>{{ $venue->telephone }}</li>
      <li>{{ $venue->email }}</li>
      <br>
   

   <form action="/venues/{{$venue->id}}/rewards" method="post">
      @csrf
      <input type="text" name="name" placeholder="Naziv nagrade" id="">
      <input type="text" name="image" placeholder="Slika" id="">
       <input type="number"  min="0" name="reward_points" placeholder="Vrijednost nagrade"  id="">
       <input type="date"  name="expiration_date" placeholder="Datum isteka nagrade"  id="">
   
      <input type="submit" value="Kreiraj Nagradu">
      </form>      
 </div>



 <br>
<h4>Popis nagrada</h4>
@forelse ($reward as $rewards)
<div>
  <div>
      <li>{{ $rewards->name }}</li>
      <li>{{ $rewards->reward_points }}</li>
    
     <br>
  </div>
@empty
  <p>Nemate Nagrada</p>
@endforelse


     


@endsection
