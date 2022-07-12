<?php

namespace App\Http\Requests\API\V1\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddCommentRequest extends FormRequest
{

    public function authorize()
    {
        return Auth::check();
    }


    public function rules()
    {
        return [
            'story_id' => 'required|exists:stories,id',
            'text'     => 'required|string|min:5|max:200'
        ];
    }
}
