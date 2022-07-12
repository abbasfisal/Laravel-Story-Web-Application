<?php

namespace App\Http\Requests\API\V1\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreStoryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return Auth::check();
    }


    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|min:5',
            'text'        => 'required|string|min:10'
        ];
    }
}
