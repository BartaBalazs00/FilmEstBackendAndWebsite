<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\mentettfilmek;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $error = "";
        $search = "";
        $users = User::paginate(3);
        return view('profiles.index',[
            'users' => $users,
            'error' => $error,
            "search" => $search
        ]);
    }

    public function indexWithError($error, $search)
    {
        $users = User::paginate(3);
        return view('profiles.index',[
            'users' => $users,
            'error' => $error,
            "search" => $search
        ]);
    }

    public function search(Request $request)
    {
        $error = "";

        if($request->get("search") != ""){

            $search = $request->get("search");
            $users = User::where('username', 'LIKE', '%'.$search.'%')->paginate(3);
            $users->appends($request->all());

            if($users->count() > 0){
                return view('profiles.index', [
                    'users' => $users,
                    "error" => $error,
                    "search" => $search
                ]);

            } else {
                $error = "There was no user found for: ".$search;
                return ProfilesController::indexWithError($error, $search);
            }
        }

        return redirect("/profile");
    }
    
    public function following(User $user, Request $request)
    {
        $users = User::find($user->following()->pluck('profiles.user_id'));
        $users->append($request->all());

        return view('profiles.following',[
            'users' => $users,
            'followingUser' => $user
        ]);
    }

    public function followers(User $user)
    {

        $users = User::find($user->profile->followers->pluck('profile.user_id'));
        
        return view('profiles.followers',[
            'users' => $users,
            'followedUser' => $user
        ]);
        
    }

    public function show($user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user) : false;
        //dd($follows);
        $user = User::findOrFail($user);

        $mentettFilmek = $user->getMentettFilmek($user);
       // dd($mentettFilmek);
        return view('profiles.show', [
            'user' => $user,
            'mentettFilmek' => $mentettFilmek,
            'follows' => $follows
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
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
