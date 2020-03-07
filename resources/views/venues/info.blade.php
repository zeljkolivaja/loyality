@extends('layouts.app')
@section('content')
<div class="container">

    <div class="text-center">

        <a class="btn btn-secondary" href="{{ url('/admins') }}/{{$venue->id}}/show">Povratak</a>

    </div>

    <br />

    <div class="card" style="width: 25rem;">
        {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
        <div class="card-body">
            <h5 class="card-title">Podaci o poslovnici</h5>
            {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"> <b>Naziv poslovnice :</b> {{ $venue->name }}</li>
            <li class="list-group-item"><b>Adresa poslovnice :</b> {{ $venue->adress }}</li>
            <li class="list-group-item"><b>Broj telefona :</b> {{ $venue->telephone }} </li>
            <li class="list-group-item"><b>Email adresa :</b> {{ $venue->email }} </li>
        </ul>
        <div class="card-body">

            <p><a href="/admins/{{$venue->id}}/edit" class="btn btn-dark">Ažuriraj podatke o poslovnici</a></p>
<form method=" POST" action="/admins/{{ $venue->id }}">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-danger" value="Obriši poslovnicu {{ $venue->name }}"
                        onclick="return confirm('Jeste li sigurni da želite obrisati poslovnicu ')" ;>
                    </form>
        </div>
    </div>


</div>
@endsection
