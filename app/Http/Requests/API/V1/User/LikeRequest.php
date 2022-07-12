<?php

namespace App\Http\Requests\API\V1\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LikeRequest extends FormRequest
{

    public function authorize():bool
    {
        return Auth::check();
    }


    public function rules():array
    {
        return [
            'story_id' => 'required|exists:stories,id'
        ];
    }
}
