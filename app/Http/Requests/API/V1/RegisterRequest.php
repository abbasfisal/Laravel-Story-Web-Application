<?php

namespace App\Http\Requests\API\V1;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'name'     => 'required|string|min:5',
            'email'    => 'required|email|unique:users,email',
            'username' => 'nullable|string|min:5|unique:users,username',
            'avatar'   => 'required|mimes:jpg,png,jpeg',
            'password' => 'required|string|min:5',

        ];
    }
}
