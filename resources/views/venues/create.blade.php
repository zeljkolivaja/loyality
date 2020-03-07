@extends('layouts.app')

@section('content')

<div class="container">

    <div class="text-center">
        <a class="btn btn-primary" href="{{ url('/admins') }}">Povratak</a>
        <br/>

    <p><h3>Unesite podatke o poslovnici</h3></p>
</div>


    <form class="form-inline justify-content-center" action="/admins" method="post">
        @csrf

        <input type="text" class="form-control" name="name" aria-describedby="Ime poslovnice"
            placeholder="Ime Poslovnice">

        <input type="text" class="form-control" name="adress" aria-describedby="Adresa" placeholder="Adresa">

        <input type="email" class="form-control" name="email" aria-describedby="Email adresa"
            placeholder="Email adresa">

        <input type="number" class="form-control" name="telephone" aria-describedby="Broj telefona"
            placeholder="Broj telefona">

        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Kreiraj poslovnicu</button>

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
