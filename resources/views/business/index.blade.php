@extends('layouts.app')
@section('content')

{{-- <div>
    <a href="/businesses/create" class="py-2 px-5 bg-blue-400 rounded float-right my-3 text-white">Add a New
        Business</a>
</div> --}}
<section class="flex index items-start">

    <aside class="md:block hidden index__aside bg-orange-500 mr-5">
        i am a side
    </aside>
    <main class="index__main flex-1">
        @foreach ($businesses as $business)
        @include('business.businessCard')
        @endforeach
    </main>
</section>
@endsection
