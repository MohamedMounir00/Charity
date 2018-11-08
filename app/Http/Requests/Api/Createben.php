<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class Createben extends FormRequest
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
            //
            'username'=>'required',
            'personal_id'=>'required',
            'adderss'=>'required',
           // 'sons'=>'required',
            //'Wives'=>'required',
            'typePoor'=>'required',

        ];
    }
}
