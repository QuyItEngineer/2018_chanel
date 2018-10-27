<?php
/**
 * Created by IntelliJ IDEA.
 * User: macintosh
 * Date: 4/7/18
 * Time: 9:06 AM
 */

namespace App\Services;


use App\Models\SocialAccount;
use App\Models\User;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\UploadedFile;

class UserService implements \App\Contracts\UserService
{

    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const ROLE_STYLIST = 'stylist';

    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var RoleRepository
     */
    private $roleRepository;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     * @param RoleRepository $roleRepository
     */
    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * @param array $attributes
     * @param UploadedFile $avatar
     * @param array $roles
     * @return User
     * @throws \Exception
     */
    public function createUserWithRole(array $attributes, UploadedFile $avatar = null, array $roles = [])
    {
        \DB::beginTransaction();
        try {
            if (isset($avatar)) {
                $avatarPath = $avatar->store('avatar', 'public_uploads');
                $attributes['avatar'] = '/uploads/' . $avatarPath;
            }
            /** @var User $model */
            $model = $this->userRepository->create($attributes);

            $attributes['password'] = bcrypt($attributes['password']);

            $model->syncRoles($roles);
            \DB::commit();
            return $model;
        } catch (\Exception $ex) {
            \DB::rollBack();
            throw $ex;
        }
    }

    /**
     * @param array $attributes
     * @param $id
     * @param UploadedFile|null $avatar
     * @param array $roles
     * @return User
     * @throws \Exception
     */
    public function updateUserWithRole(array $attributes, $id, UploadedFile $avatar = null, array $roles = [])
    {
        \DB::beginTransaction();
        try {
            if (isset($avatar)) {
                $avatarPath = $avatar->store('avatar', 'public_uploads');
                $attributes['avatar'] = '/uploads/' . $avatarPath;
            }
            if (isset($attributes['password'])) {
                $attributes['password'] = bcrypt($attributes['password']);
            } else {
                unset($attributes['password']);
            }
            /** @var User $model */
            $model = $this->userRepository->update($attributes, $id);
            $model->syncRoles($roles);
            \DB::commit();

            return $model;
        } catch (\Exception $ex) {
            \DB::rollBack();
            throw $ex;
        }
    }

    /**
     * @param mixed $socialUser
     * @param string $provider
     * @param array $roles
     * @return User
     * @throws \Exception
     * @author Lai Vu <vuldh@nal.vn>
     */
    public function findOrCreateFromUserSocial($socialUser, $provider, $roles = [])
    {
        $socialAccount = SocialAccount::where([
            'provider_id' => $socialUser->id,
            'provider' => $provider
        ])->first();
        if ($socialAccount) {
            return $socialAccount->user;
        }
        $user = User::where('email', $socialUser->email)->first();

        if (!$user) {
            $hashed_random_password = \Hash::make(str_random(8));
            $user = $this->createUserWithRole([
                'username' => $socialUser->nickname,
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'avatar' => $socialUser->avatar,
                'password' => $hashed_random_password
            ], null, $roles);
        }
        $user->socialAccounts()->create([
            'provider_id' => $socialUser->id,
            'provider' => $provider
        ]);

        return $user;
    }
}
