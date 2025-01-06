<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class roll_detail_motor4Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return[
            'id' => $this->id,
            'temperature' => $this->temperature,
            'vibration' => $this->vibration,
            'speed' => $this->speed,
            'airpressure' => $this->airpressure,
            'created_at' => $this->created_at,
        ];
    }
}
