<?php

namespace App\Modules\Api\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FlatResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'unit_id' => $this->unit_id,
            'flat_type_id' => $this->flat_type_id,
            'unit_number' => $this->unit_number,
            'area' => $this->area,
            'electric' => $this->electric,
            'water' => $this->water,
            'room' => $this->room,
            'hall' => $this->hall,
            'bathroom' => $this->bathroom,
            'floor' => $this->floor,
            'unit' => $this->whenLoaded('unit', function () {
                return $this->unit ? [
                    'id' => $this->unit->id,
                    'name' => $this->unit->name,
                ] : null;
            }),
            'flat_type' => $this->whenLoaded('flattype', function () {
                return $this->flattype ? [
                    'id' => $this->flattype->id,
                    'name' => $this->flattype->name,
                ] : null;
            }),
            'created_at' => $this->created_at ? $this->created_at->toDateTimeString() : null,
            'updated_at' => $this->updated_at ? $this->updated_at->toDateTimeString() : null,
        ];
    }
}
