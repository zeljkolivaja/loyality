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


        <form class="form-inline justify-content-center" action="/users" method="get">
            <input type="search" class="form-control" name="name" type="search" id="name"
                aria-describedby="pretraga korisnika" placeholder="Korisničko ime">
            <input type="hidden" class="form-control" name="venue_id" value="{{$venue->id}}" placeholder="Password">

            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <br>

        <div>
            <div>
                <br>

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

                        <p><a href="/admins/{{$venue->id}}/edit" class="btn btn-primary"">Ažuriraj podatke o poslovnici</a></p>
              <form method=" POST" action="/admins/{{ $venue->id }}">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-danger" value="Obriši poslovnicu {{ $venue->name }}"
                                    onclick="return confirm('Jeste li sigurni da želite obrisati poslovnicu ')" ;>
                                </form>
                    </div>
                </div>


                <br>
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



            <br>
            <h4>Popis nagrada</h4>

            @forelse ($reward as $rewards)


            <div class="card" style="width: 25rem;">
                {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                <div class="card-body">
                    <h5 class="card-title">Nagrade</h5>
                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> <b>Ime nagrade :</b> {{  $rewards->name  }}</li>
                    <li class="list-group-item"><b>Vrijednost nagrade :</b> {{  $rewards->reward_points }}</li>
                    <li class="list-group-item"><b>Datum isteka ponude :</b> {{ $rewards->expiration_date }} </li>
                </ul>
                <div class="card-body">
                    <p><a href="/rewards/{{ $rewards->id}}/edit" class="btn btn-primary"">Editiraj nagradu</a></p>


              <form method=" POST" action="/rewards/{{ $rewards->id }}">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Obriši nagradu {{ $rewards->name }}"
                                onclick="return confirm('Jeste li sigurni da želite obrisati nagradu ')" ;>
                            </form>


                </div>
            </div>

            @empty
            <p>Nemate Nagrada</p>
            @endforelse


        </div>
    </div>

    @endsection
