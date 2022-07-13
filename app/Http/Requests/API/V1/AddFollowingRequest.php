<?php

namespace App\Http\Requests\API\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddFollowingRequest extends FormRequest
{

    public function authorize()
    {
        return Auth::check();
    }


    public function rules()
    {
        return [
            'following_id' => 'required|exists:users,id'
        ];
    }
}
