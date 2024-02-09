<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GalleryResource extends JsonResource
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
            'image_path_1' => $this->image_path_1,
            'image_path_2' => $this->image_path_2,
            'image_path_3' => $this->image_path_3,
            'image_path_4' => $this->image_path_4,
            'image_path_5' => $this->image_path_5,
            'detailed_info_id' => $this->detailed_info_id,
        ];    }
}
