<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'product_image' => 'nullable|image|mimetypes:image/*',
            'product_description' => 'nullable|string',
            'product_type' => 'required|string',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
