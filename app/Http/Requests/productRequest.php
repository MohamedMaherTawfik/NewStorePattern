<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
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
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price'=>'required|numeric',
            'description'=>'required|string|min:3|max:100',
            'quantity'=>'required|integer',
            'categories_id'=>'required|exists:categories,id',
            'brands_id'=>'required|exists:brands,id',
            'marketplace_id'=>'required|exists:marketplaces,id',
        ];
    }
}
