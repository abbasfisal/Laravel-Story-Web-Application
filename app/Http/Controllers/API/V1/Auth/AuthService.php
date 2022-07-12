<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\API\Services\UploadService;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService extends Controller
{

    public static function Register(RegisterRequest $request): array|false
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


    public static function Login(Request $request): array|false
    {
        $credetial = ['email' => $request->username, 'password' => $request->password];

        if (Auth::attempt($credetial)) {
            $user = Auth::user();
            $data['token'] = $user->createToken('story')->plainTextToken;
            $data['name'] = $user->name;

            return $data;
        }
        return false;
    }


    public static function logOut(): bool
    {
        return Auth::user()
                   ->tokens()
                   ->delete();
    }
}
