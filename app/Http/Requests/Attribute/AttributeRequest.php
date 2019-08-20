<?php

namespace App\Http\Requests\Attribute;

use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
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
            'code' => 'required',
            'name'          =>  'required',
            'frontend_type' =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'please enter the attribute code',
            'name.required' => 'please enter the attribute name',
            'frontend_type.required' => 'please enter the frontend_type name',
        ];
    }
}
