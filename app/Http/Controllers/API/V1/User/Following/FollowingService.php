<?php

namespace App\Http\Controllers\API\V1\User\Following;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowingService extends Controller
{

    public static function add(string $following_id)
    {

        $following_exist_count = Auth::user()
                                     ->following()
                                     ->where('following_id', $following_id)
                                     ->get()
                                     ->count();

        if ($following_exist_count == 0) {
            Auth::user()
                ->following()
                ->attach((int)$following_id);

            return true;
        }

        return false;

    }

    public static function getFollowingList($perPage, $autId)
    {
        return User::with('following')
                   ->where('id', $autId)
                   ->paginate($perPage);
    }

    public static function getFollowersList($perPage, $autId)
    {
        return User::with('followers')
                   ->where('id', $autId)
                   ->paginate($perPage);
    }
}
