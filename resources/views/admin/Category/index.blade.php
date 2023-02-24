@extends('layouts.admin')
@section('content')
    <div class="container">

        @if (session('message'))
            <h1 class="bg-success p-3 my-2 text-white">{{ 'message' }}</h1>
        @endif

        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="col-md-12">
                        <a href="{{ url('admin/category/create') }}" class="btn btn-outline-primary float-end">Add
                            Category</a>
                    </div>
                </div>
                <div class="card-body">


                    <div class="col-md-12 mt-2">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category as $item)
                                            <tr>
                                                <th>{{$item->id}}</th>
                                                <th scope="row">{{$item->name}}</th>
                                                <td>{{$item->description}}</td>
                                                <td>
                                                    <img width="100px" height="100px"src="{{url('category/'.$item->image)}}" alt="">
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/category/edit/'. $item->id) }}" class="btn btn-success">Edit</a>
                                                    <a href="{{ url('admin/category/delete/'. $item->id) }}" class="btn btn-danger">Delete</a>
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
