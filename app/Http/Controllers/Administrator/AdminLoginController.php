<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Requests\CheckUserLoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function getLogin()
    {
        return view('admincp.login');
    }

    public function postLogin(CheckUserLoginRequest $request)
    {
        $login = $request->only([
            'email',
            'password',
        ]);

        if (Auth::attempt($login)) {
            return redirect()->route('admincp.dashboard');
        } else {
            return redirect()->back()->with('status', trans('message.admin.login _status'));
        }
    }

    public function getLogout()
    {
        Auth::logout();

        return redirect()->route('admincp.login');
    }
}
