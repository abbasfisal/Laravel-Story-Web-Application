<?php

namespace App\Http\Controllers\API\V1\User\Story;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\User\LikeRequest;
use App\Http\Requests\API\V1\User\StoreStoryRequest;
use App\Http\Resources\API\V1\StoryResource;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StoryController extends Controller
{
    public function store(StoreStoryRequest $request)
    {

        $result = StoryService::store($request);

        if ($result) {
            return $this->handleSuccess($result, config('story.message.create'));
        }

        return $this->handleError(config('story.message.faile_create'), Response::HTTP_NO_CONTENT);

    }

    public function like(LikeRequest $request)
    {
        $like_result = StoryService::like($request->story_id);

        if ($like_result) {
            return $this->handleSuccess($like_result, config('story.message.create'));
        }

        return $this->handleError(config('story.message.exist'),[] , 204);

    }

    public function getAllLikes()
    {
        $all_likes_result =StoryService::getAllLikes(config('story.perPage'),Auth::id());

        return StoryResource::collection($all_likes_result);

    }
}
