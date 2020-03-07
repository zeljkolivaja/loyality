@extends('layouts.app')
@section('content')



<div class="container">


    <div class="text-center">



        <a class="btn btn-secondary" href="{{ url('/admins') }}/{{$venue->id}}/show">Povratak</a>
    </div>
    <br>

    <div class="text-center">

        <h4>Dodaj novu nagradu</h4>

        <form class="form-inline justify-content-center" action="/rewards/{{$venue->id}}" method="post">
            @csrf
            <input type="text" class="form-control" name="name" aria-describedby="naziv nagrade"
                placeholder="Naziv nagrade">
            {{-- <input type="text" class="form-control" name="image" min="0" aria-describedby="Slika"
         placeholder="Slika"> --}}
            <input type="number" class="form-control" name="reward_points" aria-describedby="Vrijednost nagrade"
                placeholder="Vrijednost nagrade">
            {{-- <input type="date" class="form-control" name="expiration_date"
         aria-describedby="Datum isteka nagrade" placeholder="Datum isteka nagrade"> --}}

            <button class="btn btn-dark" type="submit">Kreiraj nagradu</button>
        </form>

        <br/>
    @if($errors->any())
        {!! implode('', $errors->all('<div class="alert alert-primary" role="alert">:message</div>')) !!}
    @endif

    </div>
</div>

@endsection
