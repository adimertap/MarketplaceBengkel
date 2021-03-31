<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => 'required|string',
            'role' => 'nullable|string|in:ADMIN,USER',
            // 'email' => 'required|email|unique:tb_marketplace_user'
            'email' => ['required', 'email',
                        Rule::unique('tb_marketplace_user', 'email')
                        ->ignore($this->id)],
        ];
    }
}
