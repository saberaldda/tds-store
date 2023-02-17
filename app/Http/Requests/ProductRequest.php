<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'        => 'required|max:255',
            'category_id' => 'required|int|exists:categories,id',
            'description' => 'nullable|min:5',
            'image'       => 'nullable|image|dimensions:width=760,height-760',
            'price'       => 'required|numeric|min:0',
            'sale_price'  => 'nullable|numeric|min:0',
            'quantity'    => 'required|int|min:0',
            'sku'         => 'nullable',
                                    // |unique:products,sku
            'width'       => 'nullable|numeric|min:0',
            'height'      => 'nullable|numeric|min:0',
            'length'      => 'nullable|numeric|min:0',
            'weight'      => 'nullable|numeric|min:0',
            'status'      => 'in:' . Product::STATUS_ACTIVE .',' . Product::STATUS_DRAFT,
        ];
    }
}
