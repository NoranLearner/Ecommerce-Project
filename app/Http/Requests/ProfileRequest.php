<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'required',
            // email unique except for this id
            'email' => 'required|email|unique:admins,email,'.$this -> id,
            'password'  => 'nullable|confirmed|min:8'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'email.email' => 'صيغة البريد الالكترونى غير صحيحة',
            'unique' => 'لقد تم استخدامه سابقا',
            'password.min' => 'لابد ان لا يقل عن 8 حروف',
        ];
    }

}
