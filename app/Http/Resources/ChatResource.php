<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
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
                'id'            => $this->id,
                'Pengirim'      => $this->user_sender->nama_lengkap,
                'Penerima'      => $this->user_receiver->nama_lengkap,
                'pesan'         => $this->message_text,
                'read_at'       => $this->read_at,
                'created_at'    => $this->created_at
            ];;
    }
}
