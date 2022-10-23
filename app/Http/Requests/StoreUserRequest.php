<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->id=1;
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
            'nama_belakang'     => 'required',
            'username'          => 'required|alpha_num',
            'phone_cell'        => 'required|numeric',
            'email'             => 'required|email:rfc,dns',
        ];
    }
}
