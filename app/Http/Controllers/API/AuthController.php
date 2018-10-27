<?php

namespace App\Http\Controllers\API;

use App\Contracts\UserService;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\SocialLoginAPIRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthController extends AppBaseController
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * AuthController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function social(SocialLoginAPIRequest $request, $provider)
    {
        if (!in_array($provider, config('socials.services'))) {
            throw new NotFoundHttpException();
        }

        $socialUser = \Socialite::driver($provider)->userFromToken($request->get('token'));

        $user = $this->userService->findOrCreateFromUserSocial($socialUser, $provider);
        $token = $user->createToken('API Token');
        return response()->json([
            'token_type' => 'Bearer',
            'expires_in' => '',
            'access_token' => $token->accessToken,
            'refresh_token' => ''
        ]);
    }
}
