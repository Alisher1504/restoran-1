@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row justify-content-center my-5" style="height: 70vh">

            <div class="col-md-5">

                <div class="card p-3">

                    <form action="{{ url('reservation/steptwo/store') }}" method="POST">
                        @csrf

                        <select name="table_id" class="form-control my-2" id="">
                            @foreach ($table as $item)
                                <option value="{{ $item->id }}" @selected($item->id == $reservation->table_id)>{{ $item->name }}
                                    ({{ $item->guest_number }})
                                </option>
                            @endforeach
                        </select>
                        
                        <button type="submit"
                            style="background-color: blue; color: white; padding: 10px 15px; border-radius: 5px;">Send</button>

                    </form>

                </div>

            </div>

        </div>



    </div>
@endsection
