<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformacionRequest extends FormRequest
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
            //
            'direccion' => 'required|string|max:199',
            'email' => 'required|string|max:99|email',
            'telefono' => 'required|string|max:30',
            'descripcion' => 'required|string|max:1499',
            'mision' => 'required|string|max:1499',
            'vision' => 'required|string|max:1499',
            'objetivos' => 'required|string|max:1499',
            'textoresena1' => 'required|string|max:1499',
            'textoresena2' => 'required|string|max:1499',
            'videoprincipal' => 'required|string|max:499'
        ];
    }
}
