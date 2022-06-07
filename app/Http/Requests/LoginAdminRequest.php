<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginAdminRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    /* Validation Messages */
    /**
     * Get custom messages for validator errors.
     *
     * @return array
    */
    // vendor/laravel/framework/src/Illuminate/Foundation/Http/FormRequest.php

    public function messages()
    {
        return [
            'email.required' => 'يجب ادخال البريد الالكتروني ',
            'email.email' => 'صيغة البريد الالكتروني غير صحيحة ',
            'password.required' => 'يجب ادخال كلمة المرور'
        ];
    }
}
