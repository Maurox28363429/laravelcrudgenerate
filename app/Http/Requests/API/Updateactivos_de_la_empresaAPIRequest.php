<?php

namespace App\Http\Requests\API;

use App\Models\activos_de_la_empresa;
use InfyOm\Generator\Request\APIRequest;

class Updateactivos_de_la_empresaAPIRequest extends APIRequest
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
        $rules = activos_de_la_empresa::$rules;
        
        return $rules;
    }
}
