@extends('layouts.app')
@section('content')
 
<div class="container">
   <a href="{{ url('/admins') }}">Povratak</a> 
 <br>

  <div>
   <div>
    <form action="/admins/{{$venue->id}}" method="post">
      @csrf
      {{ method_field('PATCH') }}
      <input type="text" name="name" value="{{$venue->name}}" id="">
      <input type="text" name="adress" value="{{$venue->adress}}"  id="">
      <input type="email" name="email" value="{{$venue->email}}"  id="">
      <input type="number"  min="0" name="telephone" value="{{$venue->telephone}}"  id="">
      <input type="submit" value="Ažuriraj Poslovnicu">
      </form>    
      <br>
    </div>



 <br>
</div>


     


@endsection
