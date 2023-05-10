<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'store_id',
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer'],
            'Stock' => ['required', 'integer'],
            'rate' => ['required', 'integer'],
            'type' => [''],
            'description' => ['required', 'string', 'max:255'],
            'picturePath' => ['required', 'image'],
        ];
    }
}
