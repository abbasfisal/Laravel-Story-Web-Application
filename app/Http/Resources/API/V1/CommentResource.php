<?php

namespace App\Http\Resources\API\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'id'         => $this->id,
            'user'       => new UserCommentResource($this->user),
            'text'       => $this->text,
            'created_at' => $this->created_at->diffForHumans(),
            'replies'    => $this->when($this->replies != null, function () {
                return CommentResource::collection($this->replies);
            })
        ];
    }
}
