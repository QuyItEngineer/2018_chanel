<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/auth/social/{provider}', 'AuthController@social')->name('auth.social');

Route::group(['middleware' => ['auth:api']], function() {

    Route::get('/user', function (Request $request, \App\Repositories\UserRepository $userRepository) {
        $userRepository->setPresenter(\App\Presenters\UserPresenter::class);
        $user = $userRepository
            ->find($request->user()->id);
        return $user;
    });

    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('users', 'UserAPIController');
    });

});
