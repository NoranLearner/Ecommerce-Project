<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainCategoryRequest extends FormRequest
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

            // 🔥 For Unpaid 🔥 //

            /*
            // Photo required in create , Not for update
            'photo' => 'required_without:id|mimes:jpg,jpeg,png',
            'category' => 'required|array|min:1',
            'category.*.name' => 'required|string',
            'category.*.abbr' => 'required|string',
            //'category.*.active' => 'required|in:0,1',
            */

            // 🔥 For Paid 🔥 //

            'name' => 'required',
            // 'type' => 'required|in:1,2',
            'slug' => 'required|unique:categories,slug,'.$this -> id,

        ];
    }

    public function messages()
    {
        return [

            // 🔥 For Unpaid 🔥 //

            /*
            'photo.required_without' => 'الصورة مطلوبة',
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل لابد ان يكون احرف',
            // 'in' => 'القيم المدخلة غير صحيحة',
            */

            // 🔥 For Paid 🔥 //

            'required' => 'هذا الحقل مطلوب',
            // 'in' => 'القيم المدخلة غير صحيحة',
            'unique' => 'لقد تم استخدامه سابقا',
        ];
    }
}
