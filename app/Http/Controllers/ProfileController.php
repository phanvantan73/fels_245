<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Activity;
use App\Models\Relationship;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Auth::user()->profile;
        $followers = Relationship::where('user_id', Auth::user()->id)
            ->where('status', config('setting.default.follower'))
            ->get();
        $followings = Relationship::where('user_id', Auth::user()->id)
            ->where('status', config('setting.default.following'))
            ->get();
        $activities = Activity::where('user_id', Auth::user()->id)
            ->latest('time')
            ->take(config('setting.default.limit_activities'))
            ->get();

        return view('profile.index', compact('profile', 'followers', 'followings', 'activities'));
    }

    public function update(Request $request, $id)
    {
        try {
            $profile = Profile::findOrFail($id);
            $profile->update($request->all());
            Activity::create([
                'user_id' => Auth::user()->id,
                'action' => trans('message.action.update_profile'),
                'content' => trans('message.profiles.update', ['action' => trans('message.action.update_profile'), 'time' => now()]),
                'time' => now(),
            ]);

            return redirect('profile');
        } catch (ModelNotFoundException $e) {
            return back()->with('notFoundError', trans('message.notFoundError'));
        }
    }
}
