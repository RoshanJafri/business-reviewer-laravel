<nav class="py-5 shadow-md bg-white">
    <div class="flex justify-between items-center m-auto  container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.svg') }}" height=10 alt="Logo">
        </a>

        <div class="list-none">
            @guest

            <a class="nav-link mr-3 hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>

            @if (Route::has('register'))

            <a class="nav-button" href="{{ route('register') }}">{{ __('Register') }}</a>

            @endif

            @else
            <div class="relative ">

                <button class="flex items-center focus:outline-none  focus:text-gray-600" id="nav-dropdown"
                    aria-haspopup="true" aria-expanded="true">
                    <img src="{{ Auth::user()->displayAvatar() }}" width="30" class="rounded-full avatar"
                        alt="{{ Auth::user()->name }}">
                    <p class="ml-1 font-normal">{{ Auth::user()->name }}</p>
                </button>

                <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg" id="dropdown-items">
                    <div class="rounded-md bg-white shadow-xs">
                        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                            <a href="{{ route('profiles.show', Auth::user()->id) }}"
                                class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                                role="menuitem">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                <button type="submit" class="block w-full  text-left px-4 py-2 text-sm leading-5
                                text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100
                                focus:text-gray-900" role="menuitem">
                                    @csrf
                                    Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endguest
            </ul>
        </div>
    </div>
</nav>
