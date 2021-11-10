<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'category_id' => 'required',
            'numbers' => 'required|array',
            'numbers.*' => 'required',

            'zip_code' => 'required|array',
            'street' => 'required|array',
            'number' => 'required|array',
            'district' => 'required|array',
            'city' => 'required|array',
            'uf' => 'required|array',

            'zip_code.*' => 'required',
            'street.*' => 'required',
            'number.*' => 'required',
            'district.*' => 'required',
            'city.*' => 'required',
            'uf.*' => 'required',
        ];
    }
}
