<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'name_product' => 'required|min:3',
            'type' => 'required',
            'amount' => 'required'
        ];
    }

    public function attributes()
    {
        return [            
            'amount' => 'monto del curso'
        ];
    }

    public function messages()
    {
        return [            
            'name_product.min' => 'nombre del menu debe ser mayor a 2 caracteres'
        ];
    }
}
