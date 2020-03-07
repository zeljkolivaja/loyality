@extends('layouts.app')
@section('content')
<div class="container">
    <br>

    <div class="text-center">

        <hr>
        @if (session('message'))
        <p>{{ session('message') }}</p>
        @endif

        <div class="btn-group" role="group" aria-label="buttons">

            @forelse ($venues as $venue)
            <div>

                @if ($venue->getOriginal('pivot_admin') == 0)

                <a style="margin-left:1%" class="btn btn-dark" href="/admins/{{$venue->id}}/show" role="button">Upravljaj poslovnicom
                    {{ $venue->name }}</a>

                @else
                @endif

            </div>

            <br>

            @empty
            <p>Nemate poslovnica</p>
            @endforelse
        </div>
        <p> <br>
            <a class="btn btn-secondary" href="{{ url('/admins/create') }}">Dodaj novu poslovnicu</a></p>

    </div>
</div>
@endsection
