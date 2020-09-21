@extends('layouts.app')

@section('content')


<form method="POST" action="{{ route('login') }}" class="authentication__form">
    <img src="{{ asset('/images/logo_notext.svg') }}" class="mx-auto mb-12" alt="review logo">
    @csrf

    <div class="mb-3">
        <label for="email" class="font-medium">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    </div>

    <div class="mb-3">
        <label for="password" class="font-medium col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
        <input id="password" type="password" name="password" required autocomplete="current-password">
    </div>

    <div class="flex justify-between mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
        @if (Route::has('password.request'))
        <a class="hover:underline" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        @endif
    </div>

    @error('email')
    <div class="text-sm text-red-400 mb-2" role="alert">
        <span>{{ $message }}</span>
    </div>
    @enderror

    <button type="submit" class="nav-button mt-4">
        {{ __('Login') }}
    </button>
</form>

@endsection
