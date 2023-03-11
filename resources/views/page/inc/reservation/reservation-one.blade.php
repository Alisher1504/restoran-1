@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row justify-content-center my-5"  style="height: 70vh">

            <div class="col-md-5">

                <div class="card p-3">

                    <form action="{{ url('reservation/stepone/store') }}" method="POST">
                        @csrf
                        <input type="text" name="first_name" class="form-control my-2"
                            value="{{ $reservation->first_name ?? ''}}" placeholder="First name">
                        @error('first_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" name="last_name" class="form-control my-2"
                            value="{{ $reservation->last_name ?? '' }}" placeholder="Last name">
                        @error('last_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <input type="email" name="email" class="form-control my-2" value="{{ $reservation->email ?? '' }}" placeholder="Email">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <input type="number" name="tel_number" class="form-control my-2"
                            value="{{ $reservation->tel_number ?? '' }}" placeholder="Number">
                        @error('tel_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <input type="datetime-local" name="rest_date" class="form-control my-2" 
                        min="{{ $min_date->format('Y-m-d\TH:i:s') }}"
                        max="{{ $max_date->format('Y-m-d\TH:i:s') }}"
                            value="{{ $reservation ? $reservation->rest_date->format('Y-m-d\TH:i:s') : '' }}">
                        @error('rest_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <span>Please choose the time between 17:00 23:00</span>
                        <input type="number" name="guest_number" class="form-control my-2"
                            value="{{ $reservation->guest_number ?? '' }}" placeholder="Guest number">
                        @error('guest_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        
                        <button type="submit"
                            style="background-color: blue; color: white; padding: 10px 15px; border-radius: 5px;">Send</button>

                    </form>

                </div>

            </div>

        </div>



    </div>
@endsection
