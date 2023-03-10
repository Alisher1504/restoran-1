@extends('layouts.admin')
@section('content')
    <div class="container">
        @if (session('status'))
            <h1 class="bg-success p-3 my-2 text-white">{{   session('status') }}</h1>
        @endif
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="col-md-12">
                        <a href="{{ url('admin/menu/create') }}" class="btn btn-outline-primary float-end">Add
                            Menu</a>
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
                                            <th scope="col">Description</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($menu as $item)
                                            <tr>
                                                <th scope="row">{{ $item->name }}</th>
                                                <td>{{ $item->description }}</td>
                                                <td> {{ $item->price }} </td>
                                                <td>
                                                    <a href="{{ url('admin/menu/edit/' . $item->id) }}"
                                                        class="btn btn-success">Edit</a>
                                                    <a href="{{ url('admin/menu/delete/' . $item->id) }}"
                                                        class="btn btn-danger">Delete</a>
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
