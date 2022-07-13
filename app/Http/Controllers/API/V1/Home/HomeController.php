<?php

namespace App\Http\Controllers\API\V1\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\StoryCollection;
use App\Http\Resources\API\V1\StoryResource;
use App\Models\Story;

class HomeController extends Controller
{
    public function index()
    {
        $story_result = HomeService::latestStory(config('story.perPage'));

        return new StoryCollection($story_result);

    }

    /**
     * get a story with its comments and replies
     *
     * @param Story $story
     *
     */
    public function getStory(Story $story)
    {
        $result = HomeService::getStoryWithComments($story);
        return StoryResource::collection($result);
    }
}
