<?php

namespace App\Http\Resources;

use App\Http\Resources\API\V1\StoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserLikeStoriesResource extends JsonResource
{

    public function toArray($request):array
    {

        return [
            'story' => new StoryResource($this->story)
        ];
    }
}
