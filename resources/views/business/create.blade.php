@extends('layouts.app')

@section('content')

<div class="flex justify-center">

    <form action="/businesses" method="POST" class="form" enctype="multipart/form-data">
        @csrf

        <h1 class="text-2xl font-bold mb-3">Add a new business</h1>

        <div class="py-3 flex flex-col">
            <label for="country">Country</label>
            @include('helpers._country-dropdown')
            @error('country')
            <p class="text-red-400 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div class="py-3 flex flex-col">
            <label for="name">Business Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
            @error('name')
            <p class="text-red-400 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div class="py-3 flex flex-col">
            <label for="address">Address</label>
            <input type="text" name="address" value="{{ old('address') }}" required>
            @error('address')
            <p class="text-red-400 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div class="py-3 flex flex-col">
            <label for="city">City</label>
            <input type="text" name="city" value="{{ old('city') }}" required>
            @error('city')
            <p class="text-red-400 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div class="py-3 flex flex-col">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" value="{{ old('phone') }}" required>
            @error('phone_number')
            <p class="text-red-400 text-xs">{{ $message }}</p>
            @enderror
        </div>




        <div class="py-3 flex flex-col">
            <label for="phone_number">Location</label>
            @section('head')
            <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
            <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css" />

            <script type="text/javascript">
                navigator.geolocation.getCurrentPosition(pos => console.log(pos));


                window.onload = function () {
                    L.mapquest.key = 'lYrP4vF3Uk5zgTiGGuEzQGwGIVDGuy24';

                    var map = L.mapquest.map('map', {
                        center: [37.7749, -122.4194],
                        layers: L.mapquest.tileLayer('map'),
                        zoom: 15
                    });

                    marker = L.marker([45, -120], {
                            draggable: true
                        })
                        .addTo(map)
                        .on('dragend', function (e) {
                            console.log(e.target._latlng);
                        });
                }

            </script>
            @endsection
            <div id="map" style="width: 100%; height: 250px;" class="mb-5"></div>
        </div>


        <div class="py-3 flex flex-col">
            <label for="email">Business Email</label>
            <input type="text" name="email" value="{{ old('phone') }}" required>
            @error('email')
            <p class="text-red-400 text-xs">{{ $message }}</p>
            @enderror
        </div>


        <div class="py-3 flex flex-col">
            <label for="website_url">Website Address</label>
            <input type="text" name="website_url" value="{{ old('website_url') }}" required>
            @error('website_url')
            <p class="text-red-400 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div class="py-3 flex flex-col">
            <label for="categories">Business Categories</label>
            <select name="categories[]" multiple required>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('name')
            <p class="text-red-400 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div class="py-3 flex flex-col">
            <label for="description">Description</label>
            <textarea type="text" name="description" cols="30" rows="10">{{ old('description') }}</textarea>
            @error('description')
            <p class="text-red-400 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div class="py-3 flex flex-col">
            <label for="front_image">Business Image</label>
            <input type="file" name="front_image" class="py-2  rounded">
            @error('image')
            <p class="text-red-400 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="py-2 px-5 bg-red-500 text-white rounded block w-full">Add New</button>
        <small class="mt-2 block">By clicking, you agree to our <a class="text-blue-400" href="/terms-of-service">Terms
                of
                services</a></small>
    </form>

</div>

@endsection
