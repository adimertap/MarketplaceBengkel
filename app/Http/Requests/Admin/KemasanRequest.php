<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class KemasanRequest extends FormRequest
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
            'nama_kemasan' => 'required|min:3|max:20|unique:tb_inventory_master_kemasan,nama_kemasan',
        ];
    }

    public function messages()
    {
        return [
            'nama_kemasan.required' => 'Error! Anda Belum Mengisi Nama Kemasan',
            'nama_kemasan.min' => 'Error! Character Minimal :min digit',
            'nama_kemasan.max' => 'Error! Character Maximal :max digit',
            'nama_kemasan.unique' => 'Error! Kemasan sudah Terdaftar'
        ];
    }
}
