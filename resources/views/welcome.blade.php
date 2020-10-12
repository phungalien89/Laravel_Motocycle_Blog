@extends('layouts.app')

@section('content')
{{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/profile') }}" class="text-sm text-gray-700">{{Auth::user()->name}}</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endif
        </div>
    @endif
</div> --}}
<div class="container-fluid">
        <div class="row">
        @foreach ($posts as $post)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="hover:no-underline">
                    <div class="post_item shadow container-fluid d-flex flex-column align-items-center justify-content-center pb-3 my-3 rounded-lg">
                        <a href="/posts/{{$post->id}}">
                            <img src="/storage/{{$post->productImage}}" alt="/storage/{{$post->productImage}}">
                        </a>
                        <div class="font-bold text-center text-2xl text-danger">{{$post->productPrice}} VNĐ</div>
                        <div class="d-flex justify-content-around w-100 pt-4">
                            <button class="btn btn-primary" onclick="window.location.assign('/posts/{{$post->id}}');">Xem thêm</button>
                        <button class="btn btn-warning" onclick="window.location.assign('/profile/{{$post->user->profile->id}}');">Yêu thích</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection
