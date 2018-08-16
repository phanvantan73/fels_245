<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Activity;
use App\Models\Relationship;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $profile = Auth::user()->profile;
        $followers = Relationship::all()->where('user_id', Auth::user()->id)->where('status', 0);
        $followings = Relationship::all()->where('user_id', Auth::user()->id)->where('status', 1);
        $activities = Activity::orderBy('time', 'DESC')->where('user_id', Auth::user()->id)->take(5)->get();

        return view('profile.index', compact('profile', 'followers', 'followings', 'activities'));
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->update($request->all());

        return redirect('profile');
    }

    public function getUserNameFromId($id)
    {
        return User::findOrFail($id)->username;
    }
}
