<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index($user)
    {
        $user = User::findOrFail($user);
        return view('profiles.index', [
            'user' => $user,
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

        auth()->$user->profile->update($data);
        return redirect("/profile/{$user->id}");
    }
}
