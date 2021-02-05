<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecruitmentCandidateRequest extends FormRequest
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
        return [
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|min:11|max:13',
            'address' => 'required',
            'message' => 'nullable',
            'photo' => 'required|max:2000|image|mimes:jpeg,jpg,png',
            'cv' => 'required|max:2000|file|mimetypes:application/pdf',
        ];
    }
}
