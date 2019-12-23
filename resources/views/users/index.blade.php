@extends('layouts.app')
@section('content')
<div class="container">

    @forelse ($users as $user)

        <form action="users/" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}" id="">
            <input type="hidden" name="venueId" value="{{$venue_id}}" id="">
            <input type="submit" value="{{$user->name}}">

        </form>

        <br>
    @empty

    @endforelse



@endsection
