<?php

namespace App\Http\Resources\API\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class StoryResource extends JsonResource
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

            'id'            => $this->id,
            'title'         => $this->title,
            'text'          => $this->text,
            "comment_count" => $this->comment_count,

            'relations' => [
                'category' => new CategoryResource($this->category),
                'writer'   => new UserResource($this->user)
            ]
        ];
    }


}
