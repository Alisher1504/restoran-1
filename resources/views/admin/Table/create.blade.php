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
                                <input type="text" name="name" class="form-control" placeholder="Name">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="number" name="guest_number" class="form-control my-2"
                                    placeholder="guest_number">
                                @error('guest_number')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <select name="status" class="form-control" id="">
                                    @foreach (App\Enums\TableStatus::cases() as $item)
                                    <option value="{{ $item->value }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <select name="location" class="form-control my-2" id="">
                                    @foreach (App\Enums\TableLocation::cases() as $item)
                                    <option value="{{ $item->value }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('location')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
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