<?php

namespace App\Http\Requests\API;

use App\Models\Analistas_example;
use InfyOm\Generator\Request\APIRequest;

class CreateAnalistas_exampleAPIRequest extends APIRequest
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
        return Analistas_example::$rules;
    }
}
