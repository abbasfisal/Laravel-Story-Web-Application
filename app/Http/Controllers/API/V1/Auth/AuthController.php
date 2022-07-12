<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\LoginRequest;
use App\Http\Requests\API\V1\RegisterRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $result_data = AuthService::Login($request);

        if ($result_data) {
            return $this->handleSuccess($result_data, config('story.message.login_succ'));
        }

        return $this->handleError('Unauthorised', ['error' => 'story.message.unauthorised']);
    }

    public function register(RegisterRequest $request)
    {

        $data['token'] = AuthService::Register($request);

        return $this->handleSuccess($data, config('story.message.register_succ'));
    }

    public function logOut()
    {
        return AuthService::logOut() ?
            $this->handleSuccess([], config('story.message.logout_succ')) :
            $this->handleError([], config('story.message.logout_fail'));
    }
}
