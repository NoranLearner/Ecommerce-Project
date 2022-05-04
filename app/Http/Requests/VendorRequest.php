<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
            // Logo required in create , Not for update
            'logo' => 'required_without:id|mimes:jpg,jpeg,png',
            'name' => 'required|string|max:150',
            // mobile unique except for this id
            'mobile' => 'required|max:100|unique:vendors,mobile,'.$this -> id,
            // email unique except for this id
            'email' => 'required|email|max:100|unique:vendors,email,'.$this -> id,
            'password'   => 'required_without:id|string|min:6',
            'address' => 'required|string|max:500',
            // category_id must be in main_categories table which is id
            'category_id' => 'required|exists:main_categories,id',
            //'active' => 'required|in:0,1',
        ];
    }

    public function messages()
    {
        return [
            'logo.required_without' => 'الصورة مطلوبة',
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل لابد ان يكون احرف و ارقام',
            'max' => 'هذا الحقل طويل',
            'unique' => 'لقد تم استخدامه سابقا',
            'email.email' => 'صيغة البريد الالكترونى غير صحيحة',
            'password.required_without' => 'كلمة المرور مطلوبة',
            'password.min' => 'لابد ان لا يقل عن 6 حروف',
            'category_id.exists' => 'القسم غير موجود',
            // 'in' => 'القيم المدخلة غير صحيحة',
        ];
    }

}
