<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class playerFormRequest extends FormRequest
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
            // 'nomPlayer' => 'required|max:40',
        ];
    }
    public function messages()
    {
        return [
        //   'nomPlayer.required' => 'El nombre de categoría es un valor requerido.',
        //   'nomPlayer.max' => 'El valor ingresado no debe ser mayor a 250 caracteres.',
        //   'imageCategoria.mimes' => 'asdasdasdasfa'
        ];
    }
}
