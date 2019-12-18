@extends('layouts.app')

@section('content')
<div class="container">


    <form action="/rewards" method="post">
    @csrf
    <input type="text" name="name" placeholder="Naziv nagrade" id="">
     <input type="number"  min="0" name="reward_points" placeholder="Vrijednost nagrade"  id="">
     <input type="date"  name="expiration_date" placeholder="Datum isteka nagrade"  id="">
 
    <input type="submit" value="Kreiraj Nagradu">
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