<?php

namespace App\Http\Controllers\Administrator\Management;

use App\Repositories\Role\RoleRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use DB;

class UserController extends Controller
{
    protected $userRepository;

    protected $roleRepository;

    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->all();

        return view('admincp.management.users.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $user = $this->userRepository->create($request->only([
                    'username',
                    'email',
                    'password',
                ]));

                $user->profile()->create(config('setting.default.profile'));
                $user->roles()->attach(config('setting.default.user_role'));
            });

            return redirect()->route('users.index');
        } catch (Exception $exception) {
            return back()->with('error', trans('message.dbError.createError'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = $this->userRepository->find($id);
            $roles = $this->roleRepository->pluck('role', 'id');

            return view('admincp.management.users.edit', compact('user', 'roles'));
        } catch (Exception $exception) {
            return back()->with('error', trans('message.notFoundError'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = $this->userRepository->find($id);
            DB::transaction(function () use ($request, $user) {
                $user->update($request->only([
                    'username',
                    'email',
                ]));
                $user->roles()->update([
                    'role_id' => $request->role_id,
                ]);
            });

            return redirect()->route('users.index');
        } catch (Exception $exception) {
            return back()->with('error', trans('message.notFoundError'));
        }
    }
}
