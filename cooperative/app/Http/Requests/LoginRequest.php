<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'mobile'=>'required|numeric|digits:11',
            'password'=>'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'mobile.required'=>'وارد کردن شماره موبایل ضروری است.',
            'mobile.digits'=>'شماره موبایل باید یازده رقمی باشد.',
            'mobile.numeric'=>'شماره موبایل وارد شده نامعتبر است.',
            'password.required'=>'وارد کردن پسورد ضروری است.',
            'password.min'=>'پسورد وارد شده نامعتبر است.'

        ];
    }
}
