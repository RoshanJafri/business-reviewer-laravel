@extends('layouts.app')
@section('content')

{{-- <div>
    <a href="/businesses/create" class="py-2 px-5 bg-blue-400 rounded float-right my-3 text-white">Add a New
        Business</a>
</div> --}}
<section class="profile">
    <h1>{{ $user->name }}</h1>

    <form action="{{ route('profiles.add-avatar', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="avatar">Avatar</label>
        <input type="file" name="avatar">
        <button type="submit">Upload</button>
    </form>

    <form action="{{ route('profiles.remove-avatar', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <button type="submit">Remove</button>
    </form>

</section>
@endsection
