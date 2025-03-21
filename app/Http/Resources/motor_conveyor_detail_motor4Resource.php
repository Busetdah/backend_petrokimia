<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class motor_conveyor_detail_motor4Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'temperature' => $this->temperature,
            'vibration' => $this->vibration,
            'speed' => $this->speed,
            'arus' => $this->arus,
            'created_at' => $this->created_at,
        ];
    }
}
