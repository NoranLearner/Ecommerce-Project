<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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

            // 🔥 For Paid 🔥 //

            'parent_id' => 'required|exists:categories,id',
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $this->id ,

        ];

    }

    public function messages()
    {
        return [

            // 🔥 For Paid 🔥 //

            'required' => 'هذا الحقل مطلوب',
            'unique' => 'لقد تم استخدامه سابقا',

        ];
    }


}
