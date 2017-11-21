<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefSubUnit extends FormRequest
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
            'kd_sub' => 'required',
            'nm_sub' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Field :attribute harus diisi.',
        ];
    }    
}
