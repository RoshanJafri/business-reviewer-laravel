@extends('layouts.app')
@section('content')

{{-- <div>
    <a href="/businesses/create" class="py-2 px-5 bg-blue-400 rounded float-right my-3 text-white">Add a New
        Business</a>
</div> --}}
<section class="profile">

    <div class="flex">
        <img src="{{ $user->displayAvatar() }}" alt="{{ $user->name }}" width="200" class="rounded mr-5">
        <div>
            <h1 class="font-bold text-3xl">{{ $user->name }}</h1>
            <p>Level: 100</p>
        </div>
    </div>

    <form action="{{ route('profiles.add-avatar', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="avatar">
        <button type="submit">Upload</button>
    </form>

    @if($user->avatar)
    <form action="{{ route('profiles.remove-avatar', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <button type="submit">Remove</button>
    </form>
    @endif
</section>
@endsection
