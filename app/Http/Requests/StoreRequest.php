<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'user_id' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_no' => ['required', 'string', 'max:255'],
            'bank_name' => ['required', 'string', 'max:255'],
            'bank_no' => ['required', 'integer'],
            'account_name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'province' => ['required', 'string'],
            'postal_code' => ['required', 'integer'],
            'picture_path' => ['required','image'],
            'date_born' => ['required', 'date'],
            'city' => ['required', 'string', 'max:255'],
        ];
    }
}
