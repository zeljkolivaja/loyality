@extends('layouts.app')
@section('content')
<div class="container">

@forelse ($news as $article)


<div class="container">
    <div class="card" style="width: 29rem;">
        <div class="card-body">
          <h5 class="card-title">{{$article->name}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">Naslov članka</h6>
          <p class="card-text">{{$article->body}}</p>
        </div>
      </div>
    </div>


@empty
    Nemamo novih vijesti :) Provjerite kasnije
@endforelse

</div>
@endsection
