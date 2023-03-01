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
                                
                                <form action="{{ url('admin/table/store') }}" method="POST">
                                    @csrf
                                    <input type="text" name="first_name" class="form-control my-2" placeholder="First name">
                                    <input type="text" name="last_name" class="form-control my-2" placeholder="Last name">
                                    <input type="email" name="email" class="form-control my-2" placeholder="Email">
                                    <input type="number" name="tel_number" class="form-control my-2" placeholder="Tel number">
                                    <input type="datetime-local" name="rest_date" class="form-control my-2" placeholder="Tel number">
                                    <input type="number" name="guest_number" class="form-control my-2" placeholder="guest_number">

                                    <select name="table_id" class="form-control my-2" id="">
                                        @foreach ($table as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                    <button type="submit" style="background-color: blue; color: white; padding: 10px 15px; border-radius: 5px;">Save</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
