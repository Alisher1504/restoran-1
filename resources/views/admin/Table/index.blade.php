@extends('layouts.admin')
@section('content')
    <div class="container">

        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="col-md-12">
                        <a href="{{ url('admin/table/create') }}" class="btn btn-outline-primary float-end">Add
                            table</a>
                    </div>
                </div>
                <div class="card-body">


                    <div class="col-md-12 mt-2">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Guest number</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Location</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($table as $item)
                                            <tr>
                                                <th >{{ $item->name }}</th>
                                                <td>{{ $item->guest_number }}</td>
                                                <td>{{ $item->status->name }}</td>
                                                <td>{{ $item->location->name }}</td>
                                                <td>
                                                    <a href="{{ url('admin/table/edit/'.$item->id ) }}" class="btn btn-success text-white">Edit</a>
                                                    <a href="{{ url('admin/table/delete/'.$item->id) }}" class="btn btn-danger text-white">Delete</a>
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
