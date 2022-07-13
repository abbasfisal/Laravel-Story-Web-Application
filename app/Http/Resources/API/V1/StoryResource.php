<?php

namespace App\Http\Resources\API\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

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
            "created_at"    => $this->created_at->diffForHumans(),
            'link'          => route('get:story', [$this->id, Str::slug($this->title)]) . '?with=comments',
            "comment_count" => $this->comment_count,

            'comments'  => [
                $this->when($request->get('with') == 'comments' ? true : false, function () {
                    return CommentResource::collection($this->comments);
                }),

            ],
            'relations' => [
                'category' => new CategoryResource($this->category),
                'writer'   => new UserResource($this->user),

            ]
        ];
    }


}
