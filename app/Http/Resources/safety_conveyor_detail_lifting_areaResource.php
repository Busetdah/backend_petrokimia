<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class safety_conveyor_detail_lifting_areaResource extends JsonResource
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
            'lifting1' => $this->lifting1,
            'lifting2' => $this->lifting2,
            'palletdistance' => $this->palletdistance,
            'elapsedtime' => $this->elapsedtime,
            'created_at' => $this->created_at,
        ];
    }
}
