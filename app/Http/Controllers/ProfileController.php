<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        return view('profile.index', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    public function update()
    {
        $user = auth()->user();
        $currentImg = $user->profile->image;
        $data = request()->validate([
            'title' => 'required | max:255',
            'description' => 'required',
            'url' => 'required',
            'image' => 'image | nullable',
        ]);
        $imgArr = [];
        if(request('image')){
            $imgPath = \request('image')->store('/uploads/profile', 'public');
            $image = Image::make(\public_path('/storage/' . $imgPath))->fit(1000, 1000);
            $image->save();
            $imgArr = ['image' => $imgPath];
            if(!strpos('unavailable.png', $currentImg)){
                Storage::delete('/public/' . $currentImg);
            }
        }
        $user->profile()->update(array_merge($data, $imgArr));
        
        return \redirect('/profile')->with('info', 'Profile updated successfully');
    }
}
