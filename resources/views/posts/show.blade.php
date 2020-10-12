@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <img class="w-100" src="/storage/{{$post->productImage}}" alt="/storage/{{$post->productImage}}">
        </div>
        <div class="col-md-8 pl-md-5">
            @can('delete', $post)
                <button data-target="#modal1" data-toggle="modal" type="submit" class="btn btn-danger">Delete</button>
            @endcan
            @can('update', $post)
                <a class="btn btn-primary" href="/posts/{{$post->id}}/edit">Edit</a>
            @endcan
            <form action="/posts/{{$post->id}}" method="POST">
                @csrf
                @method('delete')
                <div id="modal1" class="modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">DELETE POST</div>
                            <div class="modal-body">
                                Do you really want to delete this post <span class="font-weight-bold text-danger">FOREVER</span>?
                            </div>
                            <div class="modal-footer">
                                <div class="div">
                                    <button type="submit" class="btn btn-danger">Sure!</button>
                                    <button data-dismiss="modal" class="btn btn-success">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="text-2xl font-weight-bold">{{$post->productName}}</div>
            <div class="font-weight-bold text-danger">{{$post->productPrice}} VNĐ</div>
            <div class="container-fluid">{!! $post->productDescription !!}</div>
            <div class="container-fluid myTable pt-4">{!! $post->productParam !!}</div>
        </div>
        
    </div>
@endsection