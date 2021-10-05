<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisingRequest extends FormRequest
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
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png'

        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'وارد کردن عنوان ضروری است',
            'description.required'=>'وارد کردن تئضیحات ضروری است',
            'price.required'=>'وارد کردن قیمت ضروری است',
            'image.required'=>'انتخاب تصویر ضروری است',
            'image.mimes'=>'فرمت تصویر نامعتبر است',

        ];
    }
}
