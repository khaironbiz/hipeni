<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConsultantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return
            [
                'id'            => $this->slug,
                'nama'          => $this->user->nama_lengkap,
                'email'         => $this->user->email,
                'hp'            => $this->user->phone_cell,
                'role'          => $this->consultant_role->consultant_role,
                'price'         => $this->price,
                'is_active'     => $this->is_active,
                'is_nakes'      => $this->is_nakes,
            ];
    }
}
