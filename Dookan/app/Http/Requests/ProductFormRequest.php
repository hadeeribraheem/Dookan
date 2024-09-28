<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
    public function my_rules()
    {
        $productId = $this->route('product'); // Get product id from route (for update)

        //dd($productId);
        $arr = [
            'name' => 'required',
            'sku' => 'required|string|max:255|unique:products,sku,'.$productId,
            'description' => 'required',
            'price' => 'required',
            'category_id'=> 'required',
            'quantity' => 'required|integer|min:1',
        ];
        if ($this->getRequestUri() == '/products'|| request()->is('api/products')) {
            $arr['images'] = 'required|array';
            $arr['images.*'] = 'required|mimes:jpeg,jpg,png,gif|max:2048';
        }

        return $arr;
    }
    public function rules(): array
    {
        return $this->my_rules();
    }
}
