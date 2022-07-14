<?php

namespace App\Http\Controllers\API\V1\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Admin\UserResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    public function getAllUsers(): AnonymousResourceCollection
    {

        $all_users_result = UserService::getAllUsers(config('story.perPage'));

        return UserResource::collection($all_users_result);
    }
}
