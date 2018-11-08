<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class Donation extends FormRequest
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
            'name'=>'required',
            'price'=>'required',
            'payment_method'=>'required',
            'office_id'=>'required',
            'cat_id'=>'required',
            'type_id'=>'required',
        ];
    }
}
