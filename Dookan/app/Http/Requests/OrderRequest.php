<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        /**
         * required_without:
         * The field under validation must be present
         * and not empty only when any of the other
         * specified fields are empty or not present.
         **/
        return [
            'selected_address' => 'nullable|exists:user_addresses,id',
            'address_en' => 'required_without:selected_address|string|max:255',
            'address_ar' => 'required_without:selected_address|string|max:255',
            'cart_items' => 'required|array',
            'cart_items.*.quantity' => 'required|integer',
            'cart_items.*.price' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'address_en.required_without' => __('keywords.address_en_required_without'),
            'address_ar.required_without' => __('keywords.address_ar_required_without'),
            'selected_address.exists' => __('keywords.selected_address_exists'),
        ];
    }

    public function attributes()
    {
        return [
            'cart_items' => __('keywords.cart_items'),
            'cart_items.*.quantity' => __('keywords.cart_items.*.quantity'),
            'cart_items.*.price' => __('keywords.cart_items.*.price'),
        ];
    }

}
