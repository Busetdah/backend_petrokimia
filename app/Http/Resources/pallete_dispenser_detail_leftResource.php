<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class pallete_dispenser_detail_leftResource extends JsonResource
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
            'airpressureforward' => $this->airpressureforward,
            'airpressureretract' => $this->airpressureretract,
            'rotationgrip' => $this->rotationgrip,
            'reedswitch' => $this->reedswitch,
            'created_at' => $this->created_at,
        ];
    }
}
