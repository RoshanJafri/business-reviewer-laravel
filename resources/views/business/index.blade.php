@extends('layouts.app')
@section('content')

<section>
    <div>
        <a href="/businesses/create" class="py-2 px-5 bg-blue-400 rounded float-right my-3 text-white">Add a New
            Business</a>
    </div>
    @foreach ($businesses as $business)
    @include('business.businessCard')
    @endforeach
</section>
@endsection
