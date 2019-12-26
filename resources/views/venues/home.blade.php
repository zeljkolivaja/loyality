@extends('layouts.app')
@section('content')
<div class="container">
    <br>

    <div class="text-center">

        <hr>
        @if (session('message'))
        <p>{{ session('message') }}</p>
        @endif

        @forelse ($venues as $venue)
        <div>


            <a class="btn btn-primary" href="/admins/{{$venue->id}}/show" role="button">Upravljaj poslovnicom {{ $venue->name }}</a>

        </div>


            <br>


            @empty
            <p>Nemate poslovnica</p>
            @endforelse
            <br>
             <a href="{{ url('/admins/create') }}">Dodaj novu poslovnicu</a>





    </div>



</div>
@endsection
