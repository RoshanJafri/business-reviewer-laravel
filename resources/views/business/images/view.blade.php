@extends('layouts.app')

@section('content')

<a href="{{ $business->path() }}">
    <- Back</a> <h4 class="text-2xl my-4 font-bold">{{ $business->name }}'s images ({{ $business->images->count() }})
        </h4>


        <div class="grid grid-cols-4 gap-4">
            @foreach ($business->images as $image)
            <img src="{{ asset($image->path()) }}" alt="{{ $business->name }}" class="rounded">
            @endforeach
        </div>

        @endsection
