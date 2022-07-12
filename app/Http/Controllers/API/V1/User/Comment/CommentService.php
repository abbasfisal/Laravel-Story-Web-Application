<?php

namespace App\Http\Controllers\API\V1\User\Comment;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentService extends Controller
{

    public static function add(Request $request)
    {
        $story = Story::find($request->story_id);
        return $story->comments()
              ->create([
                  'user_id' => Auth::id(),
                  'text'    => $request->text,

              ]);
    }
}
