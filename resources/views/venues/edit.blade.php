@extends('layouts.app')
@section('content')

<div class="container">
   <a href="{{ url('/admins') }}">Povratak</a>
 <br>

 <div class="text-center">

 <h1>Editiraj nagradu</h1>


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






</div>
 <br>
</div>





@endsection
