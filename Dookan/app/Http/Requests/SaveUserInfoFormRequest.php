<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveUserInfoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
       // app()->setLocale('ar');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('id');
        $EdituserByadmin = $this->route('user');

        $UserIdForUpdate = $userId ?? $EdituserByadmin;
        //dd($EdituserByadmin);
        $rules = [

            'name'=> 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'username' => 'required|string|min:5|max:20|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'phone' => 'required|numeric|regex:/^01[0-9]{9}$/|unique:users,phone',
        ];
        if(isset($UserIdForUpdate)){
            $rules['name'] = 'required|string|max:255|regex:/^[\pL\s]+$/u';

            $rules['personal_image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg';
            $rules['username'] = 'required|string|min:5|max:20|unique:users,username,'. $UserIdForUpdate;
            $rules['email'] = 'required|email|unique:users,email,' . $UserIdForUpdate;
            $rules['password'] = 'nullable|min:6';
            $rules['phone'] = 'required|numeric|regex:/^01[0-9]{9}$/|unique:users,phone,' . $UserIdForUpdate;
        }
        //dd($this->user()->role === 'admin');
        if ($this->user()->role === 'admin'&&!(isset($UserIdForUpdate))) {
            $rules['role'] = 'required|in:admin,seller,customer';
            $rules['status'] = 'required|in:active,inactive';
        }
        //dd($rules);
        return $rules;

    }
    public function messages()
    {
        return [
            'name.regex' => 'The name must only contain letters and spaces.',
            'username.unique' => 'This username is already taken.',
            'email.unique' => 'This email is already in use.',
            'phone.unique' => 'This phone number is already registered.',
        ];
    }

}

