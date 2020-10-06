@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-4 p-5">
            <img class="rounded-full w-75 mx-auto hover:shadow-outline" src="storage/{{$user->profile->image}}" alt="{{$user->profile->image}}">
        </div>
        <div class="col-8 pt-4">
            <div>
                <a href="/profile" class="text-2xl font-bold">{{$user->name}}</a>
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
</div>
@endsection
