<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
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
                 'email'=>'required|email|max:255|unique:users',
                 'password'=>'required',
                 'country_id'=>'required',
                 // 'city_id'=>'required',
                 'address'=>'required',
                 'pesonal_id'=>'required',
                 'mobile_1'=>'required|numeric',
                 'pirthdata'=>'required',
                 'level_id'=>'required',
                 'office_id'=>'required',
                  'roles'=>'required'
        ];
    }
}
