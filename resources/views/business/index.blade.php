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
    <main class="index__main flex-1 flex flex-col">
        <a href='/businesses/create'
            class="self-end inline-block bg-red-500 ml-auto text-white button hover:bg-red-400 mb-4 px-3 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="inline mr-2">
                <g fill="#ffff">
                    <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 11h-4v4h-2v-4H7v-2h4V7h2v4h4v2z">
                    </path>
                </g>
            </svg>Add new business</a>
        @foreach ($businesses as $business)
        @include('business.businessCard')
        @endforeach
    </main>
</section>
@endsection
