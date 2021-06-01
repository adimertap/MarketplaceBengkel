<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SparepartRequest extends FormRequest
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
            'id_jenis_sparepart' => 'required', 
            'id_merk' => 'required',
            'kode_sparepart' => 'required',  
            'nama_sparepart' => 'required', 
            'keterangan' => 'required', 
            'id_bengkel' => 'required'
        ];
    }
}
