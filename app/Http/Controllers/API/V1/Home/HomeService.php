<?php

namespace App\Http\Controllers\API\V1\Home;

use App\Http\Controllers\API\V1\User\Story\StoryService;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Story;
use App\Models\User;

class HomeService extends Controller
{

    public static function latestStory($perPage)
    {

        return StoryService::getWithPagination($perPage);
    }

    public static function getStoryWithComments(Story $story)
    {
        return Story::query()
                    ->with(['comments.replies', 'user'])
                    ->where('id', $story->id)
                    ->get();
    }

    public static function getStoriesByCategory($perPage, Category $category)
    {
        return StoryService::getByCategoryId($perPage, $category);
    }

    public static function getStoriesByWriterId($perPage, User $user)
    {
        return StoryService::getStoriesByWriterId($perPage , $user);
    }
}
