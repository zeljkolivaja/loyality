@extends('layouts.app')
@section('content')
<div class="container">





        <br>

        <div class="card" style="width: 25rem;">
            {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
            <div class="card-body">
                <h5 class="card-title">Rezultati pretrage</h5>
                {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
            </div>

            <ul class="list-group list-group-flush">

            @forelse ($users as $user)
                <li class="list-group-item">

                    <form action="users/{{$user->id}}/{{$venue_id}}" method="post">
                        @csrf

                       <input type="submit" class="btn btn-danger" value="{{$user->name}}">

                       </form>

                </li>

                @empty
                <li class="list-group-item">

                Korisnik nije pronađen
            </li>



            </ul>
            @endforelse







            </div>
        </div>






@endsection
