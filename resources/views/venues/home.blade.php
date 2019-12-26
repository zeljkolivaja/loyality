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
            <a href="/admins/{{$venue->id}}/show">Upravljaj poslovnicom {{ $venue->name }}</a>
            <form method="POST" action="/admins/{{ $venue->id }}">
                @method('DELETE')
                @csrf
                <input type="submit" value="Obriši poslovnicu {{ $venue->name }}">
            </form>

            <br>


            @empty
            <p>Nemate poslovnica</p>
            @endforelse
            <a href="{{ url('/admins/create') }}">Dodaj novu poslovnicu</a>

        </div>



    </div>



</div>
@endsection