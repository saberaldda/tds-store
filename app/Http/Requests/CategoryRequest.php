<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name'        => 'required|string|max:255|min:3',
            'parent_id'   => 'nullable|int|exists:categories,id',
            'description' => 'nullable|min:5',
            'image'       => 'nullable|image',
            // 'status'      => 'in:' . Category::STATUS_ACTIVE .',' . Category::STATUS_DRAFT,
        ];
    }
}
