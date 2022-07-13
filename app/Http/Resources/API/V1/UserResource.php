<?php

namespace App\Http\Resources\API\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name'          => $this->name,
            'username'      => $this->username,
            'avatart'       => asset(config('story.path.avatar') . $this->avatar),
            'profile-linke' => route('stories:by:userId', [$this->id, Str::slug($this->username)])

        ];
    }
}
