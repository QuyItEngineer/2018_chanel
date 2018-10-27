<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * @var UserService
     */
    private $userService;

    /**
     * Create a new controller instance.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->middleware('guest')->except('logout');
        $this->userService = $userService;
    }


    public function redirect($provider)
    {
        if (!in_array($provider, config('socials.services'))) {
            throw new NotFoundHttpException();
        }
        return \Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        if (!in_array($provider, config('socials.services'))) {
            throw new NotFoundHttpException();
        }
        $socialUser = \Socialite::driver($provider)->user();

        $user = $this->userService->findOrCreateFromUserSocial(
            $socialUser,
            $provider,
            [\App\Services\UserService::ROLE_USER]
        );

        \Auth::login($user, true);

        return redirect($this->redirectTo);
    }
}
