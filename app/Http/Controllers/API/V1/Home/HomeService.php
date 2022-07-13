<?php

namespace App\Http\Controllers\API\V1\Home;

use App\Http\Controllers\API\V1\User\Story\StoryService;
use App\Http\Controllers\Controller;

class HomeService extends Controller
{

    public static function latestStory($perPage)
    {

        return StoryService::getWithPagination($perPage);
    }
}
