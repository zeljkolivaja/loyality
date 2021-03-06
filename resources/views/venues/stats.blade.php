@extends('layouts.app')
@section('content')
<div class="container">

    <div class="text-center">

        <div class="text-center">

            <a class="btn btn-secondary" href="{{ url('/admins') }}/{{$venue->id}}/show">Povratak</a>

        </div>

        <br />

        </p>
    </div>


    <table id="myTable">


        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Points</th>
            </tr>
        </thead>
        <tbody>
            <?php $row = 0; ?>
            @foreach ($users as $user)

            <tr>
                <th scope="row"> <?php echo $row += 1; ?> </th>
                <td>
                    <form action="{{ url('/users') }}/{{$user->id}}/{{$venue->id}}" method="post">
                        @csrf
                        <input type="submit" class="btn btn-alternate" value="{{$user->name}} / {{$user->email}}">
                    </form>
                </td>

                <td> {{$user->email}}</td>
                <td>{{$user->pivot->points}}</td>
            </tr>

            @endforeach

        </tbody>
    </table>

</div>



<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

@endsection
