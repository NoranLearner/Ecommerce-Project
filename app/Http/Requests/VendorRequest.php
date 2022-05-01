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
            'mobile' => 'required|max:100',
            'email' => 'sometimes|nullable|email|max:100',
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
            'email.email' => 'صيغة البريد الالكترونى غير صحيحة',
            'category_id.exists' => 'القسم غير موجود',
            // 'in' => 'القيم المدخلة غير صحيحة',
        ];
    }

}
