@extends('layouts.app')
@section('content')

<div class="container w-full px-5 py-6 mx-auto">

    <div class="grid lg:grid-cols-4 gap-y-6">

        @foreach ($catemenu->menus as $item)
            <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                <img class="w-full h-48" src="{{ url('menu/'. $item->image ) }}" alt="Image" />
                <div class="flex items-center justify-between p-4">
                    <a href="{{ url('categorys/'.$item->id) }}" class="px-4 py-2 bg-green-600 text-green-50">{{ $item->name }}</a>
                </div>
            </div>
        @endforeach
        
        

    </div>
    
</div>

@endsection