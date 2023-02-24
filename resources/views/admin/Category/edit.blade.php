@extends('layouts.admin')
@section('content')
    <div class="container">

        <div class="col-md-7">

            <div class="card">
                <div class="card-header">
                    <div class="col-md-12">
                        <a href="{{ url('admin/category') }}" class="btn btn-outline-primary float-end">Back</a>
                    </div>
                </div>
                <div class="card-body">


                    <div class="col-md-12 mt-2">
                        <div class="row">
                            <div class="col-md-12">
                                
                                <form action="{{ url('admin/category/update/'.$cate->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="name" class="form-control" value="{{ $cate->name }}">

                                    <textarea name="description" id="" rows="4" class="form-control my-2">{{ $cate->description }}</textarea>
                                    <img width="200px" src="{{ url('category/'.$cate->image) }}" alt="">
                                    <input type="file" name="image" class="form-control mt-2">
                                    <button class="mt-2" type="submit" style="background-color: blue; color: white; padding: 10px 15px; border-radius: 5px;" >Edit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
