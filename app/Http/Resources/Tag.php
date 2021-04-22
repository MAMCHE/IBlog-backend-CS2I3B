<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Tag extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return
        [
            'name' => 'Nom du tag : '  .$this->name,
            'description' => substr($this->description,0,40) . '...',
            'created_at' => 'Heure de creation du tag : ' .$this->created_at
        ];
    }
}
