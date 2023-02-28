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
                                    <input type="number" name="guest_number" class="form-control" placeholder="guest_number">

                                    <select name="status" id="">
                                        <option value="">status</option>
                                    </select>

                                    <select name="location" id="">
                                        <option value="">location</option>
                                    </select>

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
