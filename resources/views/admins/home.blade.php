 @extends('layouts.app')
 @section('content')
<div class="container">
    <a href="{{ url('/admins/create') }}">Dodaj poslovnicu</a> 
    <a href="{{ url('/rewards/create') }}">Dodaj Nagradu</a>  
 


@forelse ($data as $venue)
<div>
    <li>{{ $venue->name }}</li>
    <li>{{ $venue->adress }}</li>
    <li>{{ $venue->telephone }}</li>
    <li>{{ $venue->email }}</li>
    <br>
@empty
    <p>Nemate poslovnica</p>
@endforelse
</div>
</div>
    


@endsection