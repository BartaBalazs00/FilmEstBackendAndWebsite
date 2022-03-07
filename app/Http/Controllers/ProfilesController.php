<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\mentettfilmek;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index($user)
    {
        $user = User::findOrFail($user);
        $mentettFilmek = Film::whereHas('user',function($q) use($user) {
                                    $q->where('user_id', $user->id);
                                })->get();
        $mentettFilmek = $mentettFilmek->reverse();
       // dd($mentettFilmek);
        return view('profiles.index', [
            'user' => $user,
            'mentettFilmek' => $mentettFilmek
        ]);
    }

    public function edit($user)
    {
        $user = User::findOrFail($user);
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'cim' => 'required',
            'leiras' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        if(request('image')){
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));  

        return redirect("/profile/{$user->id}");
    }
}
