<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />

    @yield('head')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script>
        const csrfToken = @JSON(csrf_token());
        const currentUser = @JSON(Auth::user());

    </script>
</head>

<body>
    <div id="app" class="bg-gray-100">
        <modal></modal>
        @include('layouts.navigation')
        <main>
            <div class="header" style="background-image: url('{{ asset($randomBusiness->image()) }}');">
                <input type=" text" placeholder="Search for restaurants, bars & so much more!">
                <button>Search</button>

                <div class="image__credits">Image provided by: <strong><a
                            href="{{ $randomBusiness->path() }}">{{ $randomBusiness->name }}</a></strong>
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
