<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConsultantRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id'   => 'required|numeric',
            'price'     => 'required|numeric',
            'role'      => 'required|numeric',
            'is_nakes'  => 'required',
        ];
    }
    public function messages()
    {
        return [
            'user_id.required'  => 'User Id harus diisi',
            'user_id.numeric'   => 'User Id harus diisi',
            'price.required'    => 'Harga harus diisi!',
            'password.required' => 'Password is required!'
        ];
    }
}
