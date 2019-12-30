@extends('layouts.app')
@section('content')

<div class="container">
   <a href="{{ url('/admins') }}">Povratak</a>
 <br>

 <div class="text-center">

 <h4>Dodaj novu nagradu</h4>

 <form class="form-inline justify-content-center" action="/rewards/{{$venue->id}}" method="post">
     @csrf
     <input type="text" class="form-control" name="name" aria-describedby="naziv nagrade"
         placeholder="Naziv nagrade">
     <input type="text" class="form-control" name="image" min="0" aria-describedby="Slika"
         placeholder="Slika">
     <input type="number" class="form-control" name="reward_points" aria-describedby="Vrijednost nagrade"
         placeholder="Vrijednost nagrade">
     <input type="date" class="form-control" name="expiration_date"
         aria-describedby="Datum isteka nagrade" placeholder="Datum isteka nagrade">

     <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Kreiraj nagradu</button>
 </form>

</div>
</div>

@endsection
