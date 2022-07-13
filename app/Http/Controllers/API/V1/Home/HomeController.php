<?php

namespace App\Http\Controllers\API\V1\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\StoryCollection;

class HomeController extends Controller
{
    public function index()
    {
         $story_result =HomeService::latestStory(config('story.perPage'));

        return new StoryCollection($story_result);

    }
}
