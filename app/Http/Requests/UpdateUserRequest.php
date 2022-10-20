<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'gelar_depan'       => 'required',
            'gelar_belakang'    => 'required',
            'nama_depan'        => 'required',
            'tgl_lahir'         => 'required',
            'nik'               => 'required|unique:users,nik|size:16',
            'nira'              => 'required|size:11|unique:users,nira',
            'nama_belakang'     => 'required',
            'phone_cell'        => 'required|numeric',
            'email'             => 'required|email:rfc,dns',
        ];
    }
}
