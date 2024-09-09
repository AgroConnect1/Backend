<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'farmer_id' => 'required|exists:farmers,id',
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'type' => 'required|string',
            'description' => 'required|string',
            'stock_quantity' => 'required|integer',
            'image_url' => 'url',
        ];
    }
}
