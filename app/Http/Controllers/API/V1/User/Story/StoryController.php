<?php

namespace App\Http\Controllers\API\V1\User\Story;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\User\StoreStoryRequest;
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
}
