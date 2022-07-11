<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\RegisterRequest;

class AuthController extends Controller
{
    public function login()
    {

    }

    public function register(RegisterRequest $request)
    {

        $data['token'] = AuthService::Register($request);

        return $this->handleSuccess($data, config('story.message.register_succ'));
    }
}
