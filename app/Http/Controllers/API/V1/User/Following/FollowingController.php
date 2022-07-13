<?php

namespace App\Http\Controllers\API\V1\User\Following;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\AddFollowingRequest;

class FollowingController extends Controller
{
    public function add(AddFollowingRequest $request)
    {
        $following_result = FollowingService::add($request->following_id);

        if ($following_result) {

            return $this->handleSuccess([], config('story.message.following'));
        }

        return  $this->handleError(config('story.message.following_exist' ),[] , 200 );
    }
}
