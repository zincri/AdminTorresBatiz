<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitudConsumiblesRequest extends FormRequest
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
            'nombre' => 'required|string|max:100',
            'telefono' => 'required|string|max:30',
            'email' => 'required|max:50|string|email',
            'mensaje' => 'required|string|max:1500',
            'modelo' => 'required|string|max:50'
        ];
    }
}
