<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainUserAddressRequest extends FormRequest
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
            'selected_address'=>'required',
        ];
    }
    public function attributes()
    {
        return [
            'selected_address' => __('keywords.selected_address'),
        ];
    }
}
