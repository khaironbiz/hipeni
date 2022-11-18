<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConsultationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->slug,
            'pasien'        => $this->user->nama_lengkap,
            'konsultan'     => $this->consultant->user->nama_lengkap,
            'price'         => $this->price,
            'time'          => strtotime($this->created_at),
            'last_replay'   => strtotime($this->last_replay),
            'duration'      => ((strtotime($this->last_replay)) - (strtotime($this->created_at)))/(60*60),
            'status'        => $this->active,
        ];
    }
}
