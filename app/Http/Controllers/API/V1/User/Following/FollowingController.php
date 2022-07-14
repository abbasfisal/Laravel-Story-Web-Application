<?php

namespace App\Http\Controllers\API\V1\User\Following;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\AddFollowingRequest;
use App\Http\Resources\API\V1\UserResource;
use App\Http\Resources\FollowersResource;
use App\Http\Resources\FollowingResource;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
{
    public function add(AddFollowingRequest $request)
    {
        $following_result = FollowingService::add($request->following_id);

        if ($following_result) {

            return $this->handleSuccess([], config('story.message.following'));
        }

        return $this->handleError(config('story.message.following_exist'), [], 200);
    }

    public function followingList()
    {
        $following_reuslt = FollowingService::getFollowingList(config('story.perPage') , Auth::id());
        return FollowingResource::collection($following_reuslt);
    }

    public function followersList()
    {
        $followers_reuslt = FollowingService::getFollowersList(config('story.perPage') , Auth::id())    ;
        return FollowersResource::collection($followers_reuslt);

    }
}
