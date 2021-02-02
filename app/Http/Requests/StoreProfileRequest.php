<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'profile' => 'image|mimes:jpg,png,jpeg|max:2000',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|min:11|max:13',
            'address' => 'required'
        ];
    }
}
