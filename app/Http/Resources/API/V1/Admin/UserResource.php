<?php

namespace App\Http\Resources\API\V1\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class UserResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'name'          => $this->name,
            'username'      => $this->username,
            'type'          => $this->type,
            'created_at'    => $this->created_at->diffForHumans(),
            'avatart'       => asset(config('story.path.avatar') . $this->avatar),
            'profile-linke' => route('stories:by:userId', [$this->id, Str::slug($this->username)]),
            'stories_count' => $this->stories_count,
            'relations'     => [
                'stories' => StoryResource::collection($this->stories)
            ]
        ];
    }
}
