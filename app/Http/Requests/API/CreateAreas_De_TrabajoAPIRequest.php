<?php

namespace App\Http\Requests\API;

use App\Models\Areas_De_Trabajo;
use InfyOm\Generator\Request\APIRequest;

class CreateAreas_De_TrabajoAPIRequest extends APIRequest
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
        return Areas_De_Trabajo::$rules;
    }
}
