<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddressRequest extends FormRequest
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
            'address_en' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9\s,]+$/',
            ],
            'address_ar' => [
                'required',
                'string',
                'max:255',
                'regex:/^[\p{Arabic}\s0-9]+$/u',
            ],
        ];
    }
    public function messages()
    {
        return [
            'address_en.regex' => __('keywords.address_en_regex'),
            'address_ar.regex' => __('keywords.address_ar_regex'),
        ];
    }
}
