<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>'required|min:3',
            'family'=>'required|min:3',
            'mobile'=>'required|numeric|digits:11|unique:users',
            'password'=>'required|min:6',
            'address'=>'required|min:10'

        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'وارد کردن نام ضروری است.',
            'name.min'=>' نام باید حداقل سه حرفی باشد.',
            'family.required'=>'وارد کردن نام خانوادگی ضروری است.',
            'family.min'=>'نام خانوادگی حداقل باید سه حرفی باشد.',
            'mobile.required'=>'وارد کردن شماره موبایل ضروری است.',
            'mobile.digits'=>'شماره موبایل باید یازده رقمی باشد.',
            'mobile.unique'=>'این شماره موبایل قبلا ثبت شده است.',
            'password.required'=>'کلمه عبور حداقل باید شش کاراکتری باشد.',
            'password.min'=>'کلمه عبور حداقل باید شش حرفی باشد.',
            'address.required'=>'وارد کردن آدرس ضروری است',
            'address.min'=>'آدرس حداقل باید ده حرفی باشد.'
        ];
    }
}
