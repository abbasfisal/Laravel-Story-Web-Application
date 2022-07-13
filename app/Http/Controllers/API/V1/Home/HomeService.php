<?php

namespace App\Http\Controllers\API\V1\Home;

use App\Http\Controllers\API\V1\User\Story\StoryService;
use App\Http\Controllers\Controller;
use App\Models\Story;

class HomeService extends Controller
{

    public static function latestStory($perPage)
    {

        return StoryService::getWithPagination($perPage);
    }

    public static function getStoryWithComments(Story $story)
    {
        return Story::query()->with(['comments.replies','user'])->where('id' , $story->id)->get();
    }
}
