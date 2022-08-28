<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser_jobRequest extends FormRequest
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
            //
            'mulai'       => 'required|date',
            'selesai'     => 'required|date|after:mulai',
            'posisi'      => 'required|min:3',
            'perusahaan'  => 'required|min:6',
            'active'      => 'required',
        ];
    }
}
