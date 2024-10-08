<?php

namespace App\Http\Requests;

use App\Actions\HandleRulesValidation;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class CategoryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check()&&auth()->user()->role=='admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'nullable|string',
            'icon' => 'required|string',
        ];
       /* $arr = [
            'icon:nullable|string'
        ];

        $arr_lang = [
            'name:required|string',
            'description:nullable|string',
        ];
        return HandleRulesValidation::handle($arr, $arr_lang);*/
    }
    public function messages(): array
    {
        return [
            'icon.required' => __('keywords.icon_required'),
        ];
    }

}
