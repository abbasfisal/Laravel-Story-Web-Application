<?php

namespace App\Http\Controllers\API\V1\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserService extends Controller
{

    public static function getAllUsers($perPage)
    {
        return User::with(['stories'])
                   ->withCount('stories')
                   ->paginate($perPage);
    }
}
