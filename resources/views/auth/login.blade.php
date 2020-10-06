@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-8 col-lg-6">
            <div class="text-light bg-blue-900 px-4" style="border-radius: 20px;">
                <div class="text-center py-3">
                    <div class="text-4xl font-weight-bold">Welcome to Blog</div>
                    <div>Please enter your infomation to login</div>
                </div>

                <div class="">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group px-3 text-center hover:bg-blue-700 rounded-lg py-2
                        bg-blue-800
                        ">
                            <label for="email" class="font-bold text-2xl">{{ __('E-Mail Address') }}</label>
                            <div class="">
                                    <input id="email" type="email" placeholder="your@email.com" class="bg-transparent border-none text-center text-white text-2xl form-control form-control-plaintext @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group bg-blue-800 hover:bg-blue-700 rounded-lg text-center px-3 py-2">
                            <label for="password" class=" font-weight-bold text-2xl">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" placeholder="your password" class="bg-transparent border-none form-control form-control-plaintext text-center text-2xl text-white @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="custom-control-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block rounded-pill text-2xl">
                            {{ __('Login') }}
                        </button>

                        <div class="row py-3">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            <a class="ml-auto btn btn-link" href="/register">Not sign up? Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
