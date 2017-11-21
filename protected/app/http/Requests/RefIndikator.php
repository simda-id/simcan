<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefIndikator extends FormRequest
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
            'jenis_indikator' => 'required|integer',
            'sifat_indikator' => 'required|integer',
            'nm_indikator' => 'required|string|max:255',
            'flag_iku' => 'integer',
            'asal_indikator' => 'integer',
            'sumber_data_indikator' => 'max:255',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Field :attribute harus diisi.',
            'integer' => 'Field :attribute harus angka.',
        ];
    }    
}
