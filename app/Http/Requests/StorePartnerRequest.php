<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartnerRequest extends FormRequest
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
            'id_pj'         => 'required',
            'nama_partner'  => 'required',
            'singkatan'     => 'required',
            'email'         => 'required|email:rfc,dns',
            'hp'            => 'required|numeric',
            'website'       => 'required',
            'nomor_sk'      => 'required',
            'tanggal_sk'    => 'required|date',
            'valid_to'      => 'required|date',
        ];
    }
}
