<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class

VipRequest extends FormRequest
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
            'role'=>'required',
            'branch'=>'required'

        ];
    }

    public function messages()
    {
        return [
            'role.required'=>'انتخاب نقش ضروری است.',
            'branch.required'=>'انتخاب شعبه ضروری است.',
        ];
    }
}
