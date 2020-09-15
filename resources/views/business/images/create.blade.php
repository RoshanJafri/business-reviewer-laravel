@extends('layouts.app')

@section('content')

<div class="flex justify-center">

    <form action="{{ route('images.store', $business->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="py-3 flex flex-col">
            <label for="image">Add A Business Image</label>
            <input type="file" name="image" class="py-2  rounded">
            @error('image')
            <p class="text-red-400 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="py-2 px-5 bg-blue-400 text-white rounded">Add New Image</button>
    </form>

</div>

@endsection
