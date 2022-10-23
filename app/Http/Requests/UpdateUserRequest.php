<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
            'nama_depan'        => 'required',
            'nama_belakang'     => 'required',
            'gelar_belakang'    => 'required',
            'tgl_lahir'         => 'required',
            'nik'               => 'required|numeric',
            'nira'              => 'required|numeric',
            'phone_cell'        => 'required|numeric',
            'email'             => 'required|email:rfc,dns',
        ];
    }
}
