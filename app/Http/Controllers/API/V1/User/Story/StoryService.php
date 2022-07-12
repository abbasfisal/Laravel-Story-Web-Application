<?php

namespace App\Http\Controllers\API\V1\User\Story;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryService extends Controller
{

    public static function store(Request $request)
    {
        $request['user_id']=Auth::id();
        
        return Story::query()
             ->create($request->toArray());
    }
}
