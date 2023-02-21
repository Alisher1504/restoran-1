@extends('layouts.admin')
@section('content')
    <div class="container">

        <div class="col-md-7">

            <div class="card">
                <div class="card-header">
                    <div class="col-md-12">
                        <a href="{{ url('admin/table') }}" class="btn btn-outline-primary float-end">Back</a>
                    </div>
                </div>
                <div class="card-body">


                    <div class="col-md-12 mt-2">
                        <div class="row">
                            <div class="col-md-12">
                                
                                <form action="">

                                    <input type="text" name="name" class="form-control" placeholder="Name">

                                    <textarea name="description" id="" rows="4" class="form-control my-2" placeholder="Description"></textarea>

                                    <input type="file" class="form-control">

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
