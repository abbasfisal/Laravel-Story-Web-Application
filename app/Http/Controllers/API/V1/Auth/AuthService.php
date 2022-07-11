<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\API\Services\UploadService;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService extends Controller
{

    public static function Register(RegisterRequest $request)
    {


        $avatarName = UploadService::uploadImage($request->file('avatar'), public_path(config('story.path.avatar')));

        $user = User::query()
                    ->create([
                        'name'     => $request->name,
                        'email'    => $request->email,
                        'username' => $request->username,
                        'avatar'   => $avatarName,
                        'password' => Hash::make($request->password),
                    ]);

        return $user->createToken('StoryApp')->plainTextToken;


    }
}
