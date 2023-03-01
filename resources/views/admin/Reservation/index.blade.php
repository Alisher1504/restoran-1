@extends('layouts.admin')
@section('content')
    <div class="container">

        @if (session('status'))
            <h1 class="bg-success p-3 my-2 text-white">{{   session('status') }}</h1>
        @endif

        <div class="col-md-10">

            <div class="card">
                <div class="card-header">
                    <div class="col-md-12">
                        <a href="{{ url('admin/reservation/create') }}" class="btn btn-outline-primary float-end">Add
                            Reservation</a>
                    </div>
                </div>
                <div class="card-body">


                    <div class="col-md-12 mt-2">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">First name</th>
                                            <th scope="col">Last name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Number</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Guest Number</th>
                                            <th scope="col">Table</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reservation as $item)
                                            <tr>
                                                <th>{{ $item->first_name }}</th>
                                                <td>{{ $item->last_name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->tel_number }}</td>
                                                <td>{{ $item->rest_date }}</td>
                                                <td>{{ $item->guest_number }}</td>
                                                <td>{{ $item->table->name }}</td>
                                                <td>
                                                    <a href="" class="btn btn-success">Edit</a>
                                                    <a href="" class="btn btn-danger">Delete</a>
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

        </div>

    </div>
@endsection
