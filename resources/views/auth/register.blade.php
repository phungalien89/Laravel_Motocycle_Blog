@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-8 col-lg-6">
            <div class="bg-blue-900 text-light px-4" style="border-radius: 15px;">
                <div class="text-center py-3">
                    <div class="text-4xl">{{ __('Register') }}</div>
                    <div>Enter your information to sign up</div>
                </div>

                <div class="">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group text-center bg-blue-800 hover:bg-blue-700 px-3 py-2 rounded-lg">
                            <label class="text-2xl font-weight-bold" for="name">{{ __('Name') }}</label>

                            <div class="mb-2">
                                <input id="name" type="text" placeholder="your name" class="text-2xl bg-transparent border-none text-center text-light form-control form-control-plaintext @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group text-center bg-blue-800 hover:bg-blue-700 px-3 py-2 rounded-lg">
                            <label for="email" class="text-2xl font-weight-bold">{{ __('E-Mail Address') }}</label>

                            <div class="mb-2">
                                <input id="email" type="email" placeholder="your@email.com" class="bg-transparent border-none text-2xl text-center text-light form-control form-control-plaintext @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group text-center bg-blue-800 hover:bg-blue-700 rounded-lg px-3 py-2">
                            <label for="password" class="text-2xl font-weight-bold">{{ __('Password') }}</label>

                            <div class="mb-2">
                                <input id="password" type="password" placeholder="your password" class="text-2xl bg-transparent border-none text-center text-light form-control-plaintext form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group text-center bg-blue-800 hover:bg-blue-700 px-3 py-2 rounded-lg">
                            <label for="password-confirm" class="text-2xl font-weight-bold">{{ __('Confirm Password') }}</label>

                            <div class="mb-2">
                                <input id="password-confirm" placeholder="Re-enter your password" type="password" class="text-2xl text-center text-light bg-transparent border-none form-control-plaintext form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <div class="custom-control custom-radio form-check-inline">
                                <input id="male" name="sexual" value="male" type="radio" class="custom-control-input">
                                <label class="custom-control-label" for="male">Male</label>
                            </div>
                            <div class="custom-control custom-radio form-check-inline">
                                <input id="female" name="sexual" value="female" type="radio" class="custom-control-input">
                                <label class="custom-control-label" for="female">Female</label>
                            </div>
                            @error('sexual')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="pb-3">
                            <button type="submit" class="btn btn-primary btn-block text-2xl rounded-full">
                                {{ __('Register') }}
                            </button>
                        </div>
                        <div class="row">
                            <a class="btn btn-link ml-auto" href="/login">Already sign up? Log in</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
