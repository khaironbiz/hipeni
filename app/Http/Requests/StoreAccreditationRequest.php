<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccreditationRequest extends FormRequest
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

            'organisasi_profesi_id' => 'required',
            'event_id'              => 'required',
            'peserta'               => 'required',
            'pembicara'             => 'required',
            'moderator'             => 'required',
            'panitia'               => 'required',
            'no_skp'                => 'required',
            'tgl_skp'               => 'required|date',
            'keterangan'            => 'required',
        ];
    }
}
