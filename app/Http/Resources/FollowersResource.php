<?php

namespace App\Http\Resources;

use App\Http\Resources\API\V1\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class FollowersResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'name'          => $this->name,
            'username'      => $this->username,
            'avatart'       => asset(config('story.path.avatar') . $this->avatar),
            'profile-linke' => route('stories:by:userId', [$this->id, Str::slug($this->username)]),

            "followers" => UserResource::collection($this->followers)
        ];

    }
}
