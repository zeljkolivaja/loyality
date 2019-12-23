@extends('layouts.app')
@section('content')
<div class="container">
    <br>


    <hr>
    @if (session('message'))
    <p>{{ session('message') }}</p>
    @endif

    @forelse ($venues as $venue)
    <div>
        <a href="/admins/{{$venue->id}}/show">Upravljaj poslovnicom {{ $venue->name }}</a>
        <form method="POST" action="/admins/{{ $venue->id }}">
            @method('DELETE')
            @csrf
            <input type="submit" value="Obriši poslovnicu {{ $venue->name }}">
        </form>

        <li>{{ $venue->name }}</li>
        <li>{{ $venue->adress }}</li>
        <li>{{ $venue->telephone }}</li>
        <li>{{ $venue->email }}</li>
        <br>



        @empty
        <p>Nemate poslovnica</p>
        @endforelse
        <a href="{{ url('/admins/create') }}">Dodaj novu poslovnicu</a>

    </div>



</div>




@endsection
