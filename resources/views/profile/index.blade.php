@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-4 p-5">
            <img class="rounded-full w-75 mx-auto hover:shadow-outline" src="storage/{{$user->profile->image}}" alt="{{$user->profile->image}}">
        </div>
        <div class="col-8 pt-4">
            <div>
                <a href="/profile/{{$user->id}}" class="text-2xl font-bold">{{$user->name}}</a>
            </div>
            <a href="/profile/edit" class="btn btn-primary">Edit profile</a>
            <div class="pt-2">
                <div class="text-2xl font-bold">{{$user->profile->title}}</div>
                <div>{!! $user->profile->description !!}</div>
                <a href="{{$user->profile->url}}" target="_blank">{{$user->profile->url}}</a>
            </div>
            <div>
                <a class="btn btn-primary" href="/posts/create">Add product</a>
            </div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach ($user->posts as $post)
            <div class="col-sm-6 col-md-4 col-lg-3 py-4">
                <div class="post_item container-fluid d-flex flex-column align-items-center justify-content-center shadow py-3">
                    <a href="/posts/{{$post->id}}">
                        <img class="w-100" src="/storage/{{$post->productImage}}" alt="/storage/{{$post->productImage}}">
                    </a>
                    <div class="text-center font-weight-bold text-2xl text-danger">{{$post->productPrice}} VNĐ</div>
                    <button class="btn btn-primary my-3">Xem thêm</button>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
