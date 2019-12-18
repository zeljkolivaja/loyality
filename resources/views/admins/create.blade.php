@extends('layouts.app')

@section('content')
<div class="container"

>
    <form action="/rewards" method="post">
    @csrf
    <input type="text" name="name" placeholder="Ime Poslovnice" id="">
    <input type="text" name="adress" placeholder="Adresa"  id="">
    <input type="email" name="email" placeholder="Email adresa"  id="">
    <input type="number"  min="0" name="telephone" placeholder="Telefon"  id="">
    <input type="submit" value="Kreiraj Poslovnicu">
    </form>    
    
</div>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@endsection