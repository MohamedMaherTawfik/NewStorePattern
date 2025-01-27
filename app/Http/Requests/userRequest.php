<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Validation\Rules\Password;

class userRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string|min:3|max:30',
            'email'=>'required|email|unique:users,email',
            'phone'=>'required|string|min:5|max:20',
            'address'=>'required|string|min:5|max:100',
            'password'=>['required','confirmed',Password::min(6)->mixedCase()->letters()->numbers()],
        ];
    }
}
