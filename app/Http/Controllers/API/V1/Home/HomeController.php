<?php

namespace App\Http\Controllers\API\V1\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\StoryCollection;
use App\Http\Resources\API\V1\StoryResource;
use App\Models\Category;
use App\Models\Story;
use App\Models\User;

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


    public function getStoriesByCategoryId(Category $category)
    {
        $stories_result = HomeService::getStoriesByCategory(config('story.perPage'), $category);
        return StoryResource::collection($stories_result);
    }

    public function getStoriesByWriterId(User $user)
    {
        $stories_result = HomeService::getStoriesByWriterId(config('story.perPage') , $user);

        return StoryResource::collection($stories_result);
    }
}
