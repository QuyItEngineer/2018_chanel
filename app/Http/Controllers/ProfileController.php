<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Flash;

class ProfileController extends AppBaseController
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var RoleRepository
     */
    private $roleRepository;

    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $user = \Auth::user();

        return view('profile.edit')
            ->with('user', $user);
    }

    public function update(UpdateUserRequest $request)
    {
        $user = \Auth::user();

        $updateData = $request->all();

        if (!empty($updateData['password'])) {
            $updateData['password'] = bcrypt($updateData['password']);
        } else {
            unset($updateData['password']);
        }

        if (isset($updateData['roles'])) {
            $user->syncRoles($updateData['roles']);
        }

        $user = $this->userService->updateUserWithRole($updateData, $user->id, $request->file('avatar_file'));

        Flash::success('Profile updated successfully.');

        return redirect(route('profile.index'));
    }
}
