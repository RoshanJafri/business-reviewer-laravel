@extends('layouts.app')
@section('content')
<div class="heading-image mb-5">
    <img src="{{ asset($business->image()) }}" alt="{{ $business->name }}">
</div>
<div class="business lg:flex">
    <section class="business_main flex-1 overflow-hidden">
        <h1 class="md:text-4xl text-3xl font-bold">{{ $business->name }} <small
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

        <aside class=" business_aside w-full mt-6 lg:hidden">
            <div class="w-full flex mb-4">
                @if(Auth::check())
                <button href="#" @click="openModal('add-image')"
                    class="bg-red-600 text-white mr-1 button hover:bg-red-500">Add
                    Photo</button>
                @endif
            </div>
            @include('business.components.info-card')
            <x-business-rating-card :business="$business" />
        </aside>

        <showcasedreviews :business-slug="'{{ $business->slug }}'"
            :current-user-is-owner="{{Auth::check() && Auth::user()->ownerOf($business) ? 'true' : 'false' }}">
        </showcasedreviews>

        <h3 class="font-bold text-2xl mt-6 mb-4">Guest Photos
            {{ $business->images->count() > 0 ? '(' . $business->images->count() .')' : '' }}
        </h3>

        <businessphotos :images="{{ $business->images->take(8) }}" :url="'{{ $business->path() . '/images/all'}}'">
        </businessphotos>

        <h3 class="font-bold text-2xl mt-6 mb-4">Location</h3>
        @include('business.components.map')

        @can('addReview', $business)
        <add-review :url-path="'{{ "/businesses/". $business->slug ."/review" }}'"></add-review>
        @endcan

        <reviews :current-user-is-owner="{{Auth::check() && Auth::user()->ownerOf($business) ? 'true' : 'false' }}">
        </reviews>
    </section>

    <aside class=" business_aside hidden lg:block">
        <div class="w-full flex mb-4">
            @if(Auth::check())
            <button href="#" @click="openModal('add-image')"
                class="bg-red-600 text-white mr-1 button hover:bg-red-500">Add
                Photo</button>
            @endif
        </div>
        @include('business.components.info-card')
        <x-business-rating-card :business="$business" />
    </aside>
</div>


@endsection
