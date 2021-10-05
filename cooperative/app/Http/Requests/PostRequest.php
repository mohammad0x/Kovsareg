<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'image'=>'required|mimes:jpeg,png,jpg',

        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'وارد کردن عنوان ضروری است',
            'description.required'=>'وارد کردن توضیحات ضروری است',
            'image.required'=>'وارد کردن تصویر ضروری است',
            'image.mimes'=>'فرمت تصویر نامعتبر است',

        ];
    }
}
