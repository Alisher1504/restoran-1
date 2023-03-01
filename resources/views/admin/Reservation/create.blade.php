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

                            <form action="{{ url('admin/reservation/store') }}" method="POST">
                                @csrf
                                <input type="text" name="first_name" class="form-control my-2" placeholder="First name">
                                @error('first_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" name="last_name" class="form-control my-2" placeholder="Last name">
                                @error('last_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="email" name="email" class="form-control my-2" placeholder="Email">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="number" name="tel_number" class="form-control my-2"
                                    placeholder="Tel number">
                                @error('tel_number')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="datetime-local" name="rest_date" class="form-control my-2"
                                    placeholder="Tel number">
                                @error('rest_date')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="number" name="guest_number" class="form-control my-2"
                                    placeholder="guest_number">
                                @error('guest_number')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <select name="table_id" class="form-control my-2" id="">
                                    @foreach ($table as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>

                                <button type="submit"
                                    style="background-color: blue; color: white; padding: 10px 15px; border-radius: 5px;">Save</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection