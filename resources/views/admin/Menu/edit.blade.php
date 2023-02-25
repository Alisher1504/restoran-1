@extends('layouts.admin')
@section('content')

<div class="container">

    <div class="col-md-7">

        <div class="card">
            <div class="card-header">
                <div class="col-md-12">
                    <a href="{{ url('admin/menu') }}" class="btn btn-outline-primary float-end">Back</a>
                </div>
            </div>
            <div class="card-body">


                <div class="col-md-12 mt-2">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form action="{{ url('admin/menu/update/'.$menu->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="text" name="name" class="form-control" value="{{$menu->name}}">

                                <textarea name="description" id="" rows="4" class="form-control my-2">{{ $menu->description }}</textarea>
                                <input type="number" name="price" class="form-control my-2" value="{{$menu->price}}">
                                <select name="categories[]" id="" multiple class="form-control my-2">

                                    @foreach ($categories as $item)
                                    
                                        <option value="{{ $item->id }}" @selected($menu->categories->contains($item))>{{ $item->name }}</option>

                                    @endforeach

                                </select>

                                <img width="200px" src="{{url('menu/'.$menu->image)}}" alt="">

                                <input type="file" name="image" class="form-control my-2">

                                <button class="mt-2" type="submit" style="background-color: blue; color: white; padding: 10px 15px; border-radius: 5px;" >Update</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection