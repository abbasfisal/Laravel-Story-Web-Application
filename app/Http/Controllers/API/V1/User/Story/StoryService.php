<?php

namespace App\Http\Controllers\API\V1\User\Story;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\StoryLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryService extends Controller
{

    public static function store(Request $request)
    {
        $request['user_id'] = Auth::id();

        return Story::query()
                    ->create($request->toArray());
    }

    public static function like(string $story_id)
    {

        $storyLike = StoryLike::query()
                              ->where(['story_id' => $story_id], ['user_id', Auth::id()])
                              ->first();

        if (is_null($storyLike)) {

            return StoryLike::query()
                            ->create(['user_id' => Auth::id(), 'story_id' => $story_id]);
        }
        return false;
    }
}
