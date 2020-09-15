<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return  [
            'name' => ['required'],
            'front_image' => ['required', 'file'],
            'description' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'country' => ['required'],
            'phone_number' => ['required'],
            'website_url' => ['required'],
            'email' => ['required'],
            'categories' => ['required']
        ];
    }
}