<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'nama_depan'    => 'required',
            'nama_belakang' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir'     => 'required|date',
            'email'         => 'required|email:rfc,dns|unique:users,email',
            'phone_cell'    => 'required|unique:users,phone_cell',
        ];
    }
}
