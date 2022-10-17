<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $product_id = $this->route('product')->id;
        return [
                'name'   =>      'required|string|max:255',
                'description'   =>      'nullable|string',
                'price'   =>      'required|regex:/^\d+(\.\d{1,2})?$/',
                'stocks' => 'required|numeric',

            ];
        }
}
