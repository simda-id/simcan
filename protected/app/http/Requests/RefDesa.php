<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefDesa extends FormRequest
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
            'nama_desa' => 'max:255',
        ];
    }

    public function messages()
    {
        return [
            // 
        ];
    }    
}
