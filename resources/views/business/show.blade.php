@extends('layouts.app')
@section('content')
<div class="heading-image mb-5">
    <img src="{{ asset($business->image()) }}" alt="{{ $business->name }}">
</div>
<div class="business flex">

    <section class="business_main flex-1 overflow-hidden">
        <h1 class="text-4xl font-bold">{{ $business->name }} <small
                class="text-gray-700 text-sm italic">{{ $business->viewCount() }} views</small></h1>
        <x-star-rating :rating="$business->average_review" :string="$business->reviews->count().' Reviews'" />

        @foreach ($business->categories as $category)
        <span class="italic text-md text-gray-600">{{ $category->name }} </span>
        @if(!$loop->last)
        /
        @endif
        @endforeach

        <hr class="mt-8 mb-3">


        <p class="italic "> {{ $business->description }}</p>

        <hr class="my-3">

        <h3 class="font-bold text-2xl mt-6 mb-4">Guest Photos
            {{ $business->images->count() > 0 ? '(' . $business->images->count() .')' : '' }}</h3>

        <businessphotos :images="{{ $business->images->take(8) }}">
        </businessphotos>


        <h3 class="font-bold text-2xl mt-6 mb-4">Location</h3>
        @include('business.components.map')

        @can('addReview', $business)
        <h3 class="font-bold text-2xl mb-6">Been here? Add a review!</h3>
        <hr>
        <x-add-review :business="$business" />
        @endcan

        <h3 class="font-bold text-2xl mt-6 mb-4">Reviews ({{ $business->reviewCount() }})</h3>
        <hr>

        <reviews></reviews>


    </section>

    <aside class="business_aside">
        <div class="w-full flex mb-4">
            @can('addReview', $business)
            <a href="#add-review" class="bg-red-600 text-white mr-1 button hover:bg-red-500">Add a review</a>
            @endcan
            @if(Auth::check())
            <button href="#" @click="openModal('add-image')"
                class="border border-2 border-gray-600  ml-1 text-gray-600 button hover:bg-gray-600 hover:text-white">Add
                Photo</button>
            @endif
        </div>
        @include('business.components.info-card')
        <x-business-rating-card :business="$business" />
    </aside>
</div>


@endsection
