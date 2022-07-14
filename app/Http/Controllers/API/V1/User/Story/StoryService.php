<?php

namespace App\Http\Controllers\API\V1\User\Story;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Story;
use App\Models\StoryLike;
use App\Models\User;
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

    /**
     * @param string $story_id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public static function find(string $story_id)
    {
        return Story::query()
                    ->find($story_id);
    }

    /**
     * Get Stories with ites Relations
     *
     * @param $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function getWithPagination($perPage)
    {
        return Story::query()
                    ->with(['category', 'user'])
                    ->withCount(['allComments As comment_count'])
                    ->paginate($perPage);
    }

    public static function getByCategoryId($perPage, Category $category)
    {
        return Story::query()
                    ->where('category_id', $category->id)
                    ->paginate($perPage);
    }

    public static function getStoriesByWriterId($perPage, User $user)
    {
        return Story::with('user')
                    ->where('user_id', $user->id)
                    ->paginate($perPage);
    }
}
