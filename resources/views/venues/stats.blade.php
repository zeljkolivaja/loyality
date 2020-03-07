@extends('layouts.app')
@section('content')
<div class="container">

    <div class="text-center">

             <div class="text-center">

                <a class="btn btn-secondary" href="{{ url('/admins') }}/{{$venue->id}}/show">Povratak</a>

            </div>

            <br/>

        </p>
    </div>

    <table class="table">


        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
            </tr>
        </thead>
        <tbody>
            <?php $row = 0; ?>
            @foreach ($users as $user)

            <tr>
                <th scope="row"> <?php echo $row += 1; ?> </th>
                <td> {{$user->name}} </td>
                <td>{{$user->pivot->points}}</td>
            </tr>

            @endforeach

        </tbody>
    </table>

</div>
@endsection
