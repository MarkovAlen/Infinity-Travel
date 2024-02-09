<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccommodationResource extends JsonResource
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
            'main_image' => $this->main_image,
            'additional_information' => $this->additional_information,
            'is_last_minute' => $this->is_last_minute,
            'name' => $this->name,
            'region_id' => $this->region_id,
            'rating_id' => $this->rating_id,
            'region' => new RegionResource($this->whenLoaded('region')),
            'country' => new CountryResource($this->whenLoaded('region.country')),
            'rating' => new RatingResource($this->whenLoaded('rating')),
            'detailed_info' => new DetailedInfoResource($this->whenLoaded('detailedInfo')),
            'rooms' => RoomResource::collection($this->whenLoaded('rooms')),
            'gallery' => new GalleryResource($this->whenLoaded('gallery')),
        ];    }
}
