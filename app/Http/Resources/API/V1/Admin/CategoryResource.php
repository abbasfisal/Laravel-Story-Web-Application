<?php

namespace App\Http\Resources\API\V1\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CategoryResource extends JsonResource
{

    public function toArray($request):array
    {
        return [
            'title' => $this->resource->title,
            'link'  => route('stories:by:categoryId', [$this->id, Str::slug($this->title)])
        ];
    }
}
