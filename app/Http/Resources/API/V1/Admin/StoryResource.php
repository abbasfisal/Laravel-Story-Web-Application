<?php

namespace App\Http\Resources\API\V1\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class StoryResource extends JsonResource
{

    public function toArray($request): array
    {
        return [

            'id'         => $this->id,
            'title'      => $this->title,
            'text'       => $this->text,
            "created_at" => $this->created_at->diffForHumans(),
            'link'       => route('get:story', [$this->id, Str::slug($this->title)]) . '?with=comments',
        ];
    }
}
