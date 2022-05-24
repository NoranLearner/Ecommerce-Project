<?php

namespace App\Http\Requests;

use App\Rules\ProductQty;
use Illuminate\Foundation\Http\FormRequest;

class ProductStockRequest extends FormRequest
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

            'product_id' => 'required|exists:products,id',

            'sku' => 'nullable|min:3|max:10',

            'in_stock' => 'required|in:0,1',

            'manage_stock' => 'required|in:0,1',

            // 'qty' => 'required_if:manage_stock,==,1',

            // Or By Custom Validation
            'qty'  =>[new ProductQty($this ->manage_stock )]

        ];
    }
}
