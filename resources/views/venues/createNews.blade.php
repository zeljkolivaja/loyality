@extends('layouts.app')

@section('content')

<div class="container">

    <div class="text-center">
        <a class="btn btn-secondary" href="{{ url('/admins') }}/{{$venue->id}}/show">Povratak</a>
     </div>

    <form action="/venues/{{$venue->id}}/createNews" method="post">
        @csrf
        <div class="form-group">
            <label for="newsTitle">Naslov Članka</label>
            <input type="text" name="name" class="form-control" id="newsTitle" aria-describedby="emailHelp"
                placeholder="Unesite naziv članka">
         </div>
        <div class="form-group">
            <label for="newsBody">Sadržaj članka</label>
            <textarea class="form-control" name="body" id="newsBody" rows="3" placeholder="Unesite sadržaj članka"></textarea>
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
    </form>


</div>

@endsection
