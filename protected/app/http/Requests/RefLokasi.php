<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefLokasi extends FormRequest
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
            'jenis_lokasi' => 'required|integer',
            'id_desa' => 'integer',
            'id_desa_awal' => 'integer',
            'id_desa_akhir' => 'integer',
            'koordinat_1' => 'max:255',
            'koordinat_2' => 'max:255',
            'koordinat_3' => 'max:255',
            'koordinat_4' => 'max:255',
            'luasan_kawasan' => 'numeric',
            'satuan_luas' => 'integer',
            'panjang' => 'numeric',
            'satuan_panjang' => 'integer',
            'lebar' => 'numeric',
            'satuan_lebar' => 'integer',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Field :attribute harus diisi.',
            'integer' => 'Field :attribute harus angka.',
            'numeric' => 'Field :attribute harus angka.',
        ];
    }    
}
