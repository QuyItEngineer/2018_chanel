<?php
/**
 * Created by IntelliJ IDEA.
 * User: macintosh
 * Date: 4/7/18
 * Time: 9:05 AM
 */

namespace App\Contracts;


use App\Models\User;
use Illuminate\Http\UploadedFile;

interface UserService
{

    /**
     * @param array $attributes
     * @param UploadedFile $avatar
     * @param array $roles
     * @return mixed
     */
    public function createUserWithRole(array $attributes, UploadedFile $avatar = null, array $roles = []);

    /**
     * @param array $attributes
     * @param $id
     * @param UploadedFile|null $avatar
     * @param array $roles
     * @return mixed
     */
    public function updateUserWithRole(array $attributes, $id, UploadedFile $avatar = null, array $roles = []);

    /**
     * @param mixed $socialUser
     * @param string $provider
     * @param array $roles
     * @return User
     * @author Lai Vu <vuldh@nal.vn>
     */
    public function findOrCreateFromUserSocial($socialUser, $provider, $roles = []);
}
