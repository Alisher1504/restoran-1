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
                                    <input type="number" name="guest_number" class="form-control my-2" placeholder="guest_number">

                                    <select name="status" class="form-control" id="">
                                        @foreach (App\Enums\TableStatus::cases() as $item)
                                            <option value="">{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                    <select name="location" class="form-control my-2" id="">
                                        @foreach (App\Enums\TableLocation::cases() as $item)
                                            <option value="">{{ $item->name }}</option> 
                                        @endforeach
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
