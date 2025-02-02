<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class arm_robot_detail_motor1Resource extends JsonResource
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
            'created_at' => $this->created_at,
        ];
    }
}
