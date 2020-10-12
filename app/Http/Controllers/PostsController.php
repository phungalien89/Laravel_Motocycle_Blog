<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Posts;

class PostsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'productName' => 'required | max:255',
            'productDescription' => 'required',
            'productParam' => 'required',
            'productPrice' => 'required | numeric',
            'productImage' => 'required | image'
        ]);

        $imgPath = request('productImage')->store('uploads/posts', 'public');
        $image = Image::make(public_path('/storage/' . $imgPath))->fit(1000, 1000);
        $image->save();
        $imgArr = ['productImage' => $imgPath];

        $user = auth()->user();
        $user->posts()->create(array_merge($data, $imgArr));

        return \redirect('/profile')->with('info', 'Post added successfully');
    }

    public function show($post_id)
    {
        $post = Posts::find($post_id);
        return view('posts.show', compact('post'));
    }

    public function edit($post_id)
    {
        $post = Posts::find($post_id);
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    public function update($post_id)
    {
        $data = request()->validate([
            'productName' => 'required | max:255',
            'productDescription' => 'required',
            'productParam' => 'required',
            'productPrice' => 'required | numeric',
            'productImage' => 'nullable | image'
        ]);
        $img_arr = [];
        $post = Posts::find($post_id);
        $current_img = $post->productImage;
        if(request('productImage')){
            $img_path = request('productImage')->store('/uploads/posts/', 'public');
            $image = Image::make(public_path('/storage/' . $img_path))->fit(1000, 1000);
            $image->save();
            $img_arr = ['productImage' => $img_path];
            if(!strpos('unavailable', $current_img)){
                Storage::delete('/public/' . $current_img);
            }
        }
        $post->update(array_merge($data, $img_arr));
        return redirect('/posts/' . $post_id);
    }

    public function destroy($post_id)
    {
        $post = Posts::find($post_id);
        $current_img = $post->productImage;
        Storage::delete('/public/' . $current_img);
        $post->delete();
        return redirect('/profile');
    }
}
