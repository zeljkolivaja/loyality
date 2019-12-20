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
    <a href="/admins/{{$venue->id}}/show">Uredi poslovnicu</a>
    <li>{{ $venue->name }}</li>
    <li>{{ $venue->adress }}</li>
    <li>{{ $venue->telephone }}</li>
    <li>{{ $venue->email }}</li>
    <br>
@empty
    <p>Nemate poslovnica</p>
@endforelse
<a href="{{ url('/admins/create') }}">Dodaj poslovnicu</a>

</div>
</div>
    


@endsection