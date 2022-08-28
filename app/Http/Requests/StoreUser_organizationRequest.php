<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser_organizationRequest extends FormRequest
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
            'mulai'             => 'required|date',
            'sebagai'           => 'required',
            'nama_organisasi'   => 'required|min:3',
            'active'            => 'required',
            'keterangan'        => 'required',

        ];
    }
}
