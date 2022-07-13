<?php

namespace App\Http\Controllers\API\V1\User\Following;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FollowingService extends Controller
{

    public static function add(string $following_id)
    {

        $following_exist_count = Auth::user()->following()->where('following_id', $following_id)
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
}
