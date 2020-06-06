<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProducto extends FormRequest
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
            'id' => 'required|exists:productos',
            'nombre_producto' => 'required',
            'referencia' => 'required',
            'precio' => 'required|integer|min:0',
            'peso' => 'required|integer|integer|min:0',
            'categoria' => 'required',
            'stock' => 'required|integer|min:0'
        ];
    }
}
