<?php

namespace App\Http\Requests\User\Education;

use Illuminate\Foundation\Http\FormRequest;

class StoreEducationUserRequest extends FormRequest
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
            'program_studi'     => 'required',
            'level_pendidikan'  => 'required',
            'institusi'         => 'required',
            'tahun_lulus'       => 'required',
            'nomor_ijazah'      => 'required',
            'ttd_ijazah'        => 'required',
            'pendidikan_terahir'=> 'required',
            'file'              => 'required|file',
        ];
    }
}
