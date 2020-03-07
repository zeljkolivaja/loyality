@extends('layouts.app')
@section('content')


<div class="container">

    <div class="text-center">

        <a class="btn btn-primary" href="{{ url('/admins') }}">Povratak</a>
        <br />

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

        <h3>Upravljačka ploča</h3>


        <div class="btn-group" role="group" aria-label="Basic example">

            <a class="btn btn-primary" href="/venues/{{$venue->id}}/info" role="button">Ažuriraj podatke o
                poslovnici</a>
            <a class="btn btn-primary" href="/venues/{{$venue->id}}/createNews" role="button">Dodaj Vijesti</a>
            <a class="btn btn-primary" href="/rewards/{{$venue->id}}/createReward" role="button">Dodaj nagradu</a>
            <a class="btn btn-primary" href="/admins/{{$venue->id}}/stats" role="button">Svi korisnici</a>
        </div>


        <br>

        <div>

            <br>
            <h4>Popis nagrada</h4>

            <div class="row">


                @forelse ($reward as $rewards)

                <div class="col-lg-4">

                    <div class="card" style="width: 19rem;">
                        {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                        <div class="card-body">
                            {{-- <h5 class="card-title">Nagrade</h5> --}}
                            {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"> <b>Ime nagrade :</b> {{  $rewards->name  }}</li>
                            <li class="list-group-item"><b>Vrijednost nagrade :</b> {{  $rewards->reward_points }}</li>
                        </ul>
                        <div class="card-body">
                            <p><a href="/rewards/{{ $rewards->id}}/edit" class="btn btn-primary"">Editiraj nagradu</a></p>


              <form method=" POST" action="/rewards/{{ $rewards->id }}">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-danger"
                                        value="Obriši nagradu {{ $rewards->name }}"
                                        onclick="return confirm('Jeste li sigurni da želite obrisati nagradu ')" ;>
                                    </form>
                        </div>
                    </div>
                </div>


                @empty


                <div class="reward">Nemate unešenih nagrada. Dodajte <a
                        href="/rewards/{{$venue->id}}/createReward">nagradu</a></div>



                @endforelse
            </div>



        </div>






        @endsection
