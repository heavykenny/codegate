@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Manage</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (empty($allusers))
                            No User In DB.<br>
                            @endif
                            <?php $i = 1; ?>

                            @foreach ($allusers as $user)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td><a href="{{ url('update') }}/{{$user['id']}}">
                                        <p>{{ $user['name']}}</p>
                                    </a>
                                <td>{{ $user['email']}}</td>
                                <td>
                                    <form action="delete" method="post">
                                        @csrf
                                        <input type="text" hidden value="{{$user['id']}}" name="id">
                                        <input type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 