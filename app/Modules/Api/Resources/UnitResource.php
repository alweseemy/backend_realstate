<?php

namespace App\Modules\Api\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UnitResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'uses' => !empty($this->uses) ? explode('|', $this->uses) : [],
            'floors_number' => $this->floors_number,
            'postal_code' => $this->postal_code,
            'extra_number' => $this->extra_number,
            'building_number' => $this->building_number,
            'deed_number' => $this->deed_number,
            'electric_meter' => $this->electric_meter,
            'sewage_meter' => $this->sewage_meter,
            'water_meter' => $this->water_meter,
            'address' => $this->address,
            'location' => [
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'zoom' => $this->zoom ?? null,
            ],
            'owner' => $this->whenLoaded('owner', function () {
                return $this->owner ? [
                    'id' => $this->owner->id,
                    'name' => $this->owner->name,
                    'phone' => $this->owner->phone,
                    'email' => $this->owner->email,
                ] : null;
            }),
            'city' => $this->whenLoaded('city', function () {
                return $this->city ? [
                    'id' => $this->city->id,
                    'name' => $this->city->name,
                ] : null;
            }),
            'hood' => $this->whenLoaded('hood', function () {
                return $this->hood ? [
                    'id' => $this->hood->id,
                    'name' => $this->hood->name,
                ] : null;
            }),
            'unit_type' => $this->whenLoaded('unit_type', function () {
                return $this->unit_type ? [
                    'id' => $this->unit_type->id,
                    'name' => $this->unit_type->name,
                ] : null;
            }),
            'files' => !empty($this->files) ? explode('|', trim($this->files, '|')) : [],
            'created_at' => $this->created_at ? $this->created_at->toDateTimeString() : null,
            'updated_at' => $this->updated_at ? $this->updated_at->toDateTimeString() : null,
        ];
    }
}
