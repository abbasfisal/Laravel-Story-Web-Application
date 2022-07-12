<?php

namespace App\Http\Controllers\API\V1\User\Comment;

use App\Http\Controllers\API\V1\User\Story\StoryService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentService extends Controller
{

    public static function add(Request $request)
    {
        $story = StoryService::find($request->story_id);
        return $story->comments()
                     ->create([
                         'user_id' => Auth::id(),
                         'text'    => $request->text,

                     ]);
    }


    public static function reply(Request $request)
    {
        $story = StoryService::find($request->story_id);

        return $story->comments()
              ->create([
                  'user_id'   => Auth::id(),
                  'parent_id' => $request->parent_id,
                  'text'      => $request->text
              ]);
    }
}
