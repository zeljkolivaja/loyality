@extends('layouts.app')
@section('content')

<div class="container">

    <div class="text-center">
        <p><a class="btn btn-secondary" href="{{ url('/venues') }}/{{$venue->id}}/info" role="button">Povratak</a>
        </p>
        <br />


        <div>

            <div class="text-center">
                <div>

                    {{--
       <form action="/admins/{{$venue->id}}" method="post">
                    @csrf
                    {{ method_field('PATCH') }}
                    <input type="text" name="name" value="{{$venue->name}}" id="">
                    <input type="text" name="adress" value="{{$venue->adress}}" id="">
                    <input type="email" name="email" value="{{$venue->email}}" id="">
                    <input type="number" min="0" name="telephone" value="{{$venue->telephone}}" id="">
                    <input type="submit" value="Ažuriraj Poslovnicu">
                    </form> --}}

                    <form class="form-inline justify-content-center" action="/admins/{{$venue->id}}" method="post">
                        @csrf
                        {{ method_field('PATCH') }}
                        <input type="text" class="form-control" name="name" aria-describedby="Ime poslovnice"
                            value="{{$venue->name}}">
                        <input type="text" class="form-control" name="adress" aria-describedby="Adresa poslovnice"
                            value="{{$venue->adress}}">
                        <input type="email" class="form-control" name="email" aria-describedby="Email adresa"
                            value="{{$venue->email}}">
                        <input type="number" class="form-control" name="telephone" aria-describedby="Broj telefona"
                            value="{{$venue->telephone}}">
                        <button class="btn btn-dark" type="submit">Ažuriraj poslovnicu</button>
                    </form>

                    <br/>
                    @if($errors->any())
                        {!! implode('', $errors->all('<div class="alert alert-primary" role="alert">:message</div>')) !!}
                    @endif

                    <br>
                </div>

            </div>
            <br>
        </div>

        @endsection
