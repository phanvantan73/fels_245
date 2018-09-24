<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\FileReQuest;
use Illuminate\Http\Request;
use Auth;
use DB;
use Exception;
use File;
use App\Traits\CreateActivity;
use App\Traits\ProcessImage;

class ProfileController extends Controller
{
    use CreateActivity;
    use ProcessImage;

    public function index(Request $request)
    {
        try {
            $profile = $this->user->profile;
            $followers = $this->user->relationships()->followers()->get();
            $followings = $this->user->relationships()->followings()->get();
            $activities = $this->user->activities()->latest('time')
                ->take(config('setting.default.limit_activities'))
                ->get();
            $tests = $this->user->tests()->oldest()
                ->paginate(config('setting.default.paginate_tests'));
            if ($request->ajax()) {
                return view('ajax.data', compact('tests'));
            }

            return view('profile.index', compact('profile', 'followers', 'followings', 'activities', 'tests'));
        } catch (Exception $e) {
            return back()->with('notFoundError', trans('message.notFoundError'));
        }
    }

    public function update(Request $request)
    {
        try {

            DB::transaction(function () use ($request) {
                $this->user->profile()->update($request->only([
                    'first_name',
                    'last_name',
                    'birthday',
                    'address',
                    'phone_number',
                ]));

                $this->createActivity($this->user, trans('message.action.update_profile'), trans('message.default.profile'));
            });

            return redirect('profile');
        } catch (Exception $e) {
            return back()->with('dbError', trans('message.dbError.createError'));
        }
    }

    public function unfollow($id)
    {
        try {
            $relationship = $this->user->relationships()->findOrFail($id);
            $followed = $this->user->relationships()->followed();

            DB::transaction(function () use ($relationship, $followed) {
                $relationship->delete();
                $followed->delete();

                $this->createActivity($this->user, trans('message.action.unfollow'), trans('message.default.follower'), $relationship->userFollow->username);
            });

            return redirect('profile');
        } catch (ModelNotFoundException $e) {
            return back()->with('notFoundError', trans('message.notFoundError'));
        }
    }

    public function changeAvatar(FileReQuest $request)
    {
        try {
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $newFileName = $this->storeImage($file, config('setting.images.profile_img'), $this->user->id);

                DB::transaction(function () use ($newFileName) {
                    $this->user->profile()->update([
                        'avatar' => $newFileName,
                    ]);

                    $this->createActivity($this->user, trans('message.action.change'), trans('message.default.avatar'));
                });
            }

            return redirect('profile');
        } catch (Exception $e) {
            return back()->with('notFoundError', trans('message.notFoundError'));
        }

    }

    public function showTest($id)
    {
        try {
            $test = $this->user->tests()->findOrFail($id);

            return view('tests.result', compact('test'));
        } catch (ModelNotFoundException $e) {
            return back()->with('notFoundError', trans('message.notFoundError'));
        }
    }
}
