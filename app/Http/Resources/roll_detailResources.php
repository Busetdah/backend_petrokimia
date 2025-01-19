<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class roll_detailResources extends JsonResource
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
            'rpm_motor' => $this->rpm_motor,
            'rpm_roll' => $this->rpm_roll,
            'presentase' => $this->presentase,
            'getaran_hz' => $this->getaran_hz,
            'created_at' => $this->created_at,
        ];
    }
}
