<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourseFormRequest extends FormRequest
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

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido.',
            'surname.required' => 'El apellido es requerido.',
            'email.required' => 'El email es requerido.',
            'email.email' => 'El formato del email es incorrecto.',
            'email.unique' => 'Ya hay un registro con este email'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:course_forms'
        ];
    }
}
