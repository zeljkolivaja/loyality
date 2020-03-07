@extends('layouts.app')
@section('content')

 <div class="container">
    <div class="text-center">
   <a class="btn btn-secondary" href="{{ url('/admins') }}/{{$reward->venue_id}}/show">Povratak</a>
</div>
 <br>

  <div>
   <div>
    {{-- <form action="/rewards/{{$reward->id}}" method="post">
      @csrf
      {{ method_field('PATCH') }}
      <label for="name">Naziv nagrade</label>
      <input type="text" name="name" value="{{$reward->name}}" id="">

      <label for="image">Slika nagrade</label>
      <input type="text" name="image" value="{{$reward->image}}"  id="">

      <label for="image">Vrijednost nagrade u bodovima</label>
      <input type="text" name="reward_points" value="{{$reward->reward_points}}"  id="">

      <label for="image">Datum trajanja</label>
      <input type="date" name="expiration_date" value="{{$reward->expiration_date}}"  id="">
      <input type="submit" value="Ažuriraj nagradu">

      </form> --}}


      <form class="form-inline justify-content-center" action="/rewards/{{$reward->id}}" method="post">
        @csrf
        {{ method_field('PATCH') }}

        Ime nagrade
         <input type="text" class="form-control" name="name" aria-describedby="Ime nagrade"
            value="{{$reward->name}}">

        Vrijednost nagrade u bodovima
            <input type="number" class="form-control" name="reward_points" aria-describedby="Bodovi"
            value="{{$reward->reward_points}}">



        <button style="margin-left:3px" class="btn btn-dark" type="submit">Ažuriraj nagradu</button>
    </form>

    <br/>
    @if($errors->any())
        {!! implode('', $errors->all('<div class="alert alert-primary" role="alert">:message</div>')) !!}
    @endif



      <br>
    </div>
 <br>
</div>





@endsection
