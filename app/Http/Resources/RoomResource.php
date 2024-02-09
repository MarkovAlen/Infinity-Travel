<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nights_number' => $this->nights_number,
            'total_price' => $this->total_price,
            'price_per_night' => $this->price_per_night,
            'available_date' => $this->available_date,
            'type_of_room' => $this->type_of_room,
            'is_reserved' => $this->is_reserved,
            'room_number' => $this->room_number,
            'detailed_info_id' => $this->detailed_info_id,
        ];
    }
}
