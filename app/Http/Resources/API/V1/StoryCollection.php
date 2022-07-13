<?php

namespace App\Http\Resources\API\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class StoryCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }


}
