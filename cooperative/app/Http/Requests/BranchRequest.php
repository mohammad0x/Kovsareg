<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
            'name'=>'required',
            'subs'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'وارد کردن نام شعبه ضروری است.',
            'subs.required'=>'وارد کردن زیر مجموعه ها ضروری است'
        ];
    }
}
