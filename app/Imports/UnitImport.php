<?php

namespace App\Imports;

use App\Models\Unit;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Validator;

class UnitImport implements ToCollection, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null




    public function model(array $row)
    {
        return new Unit([
            'name' =>$row['name'],
            'unittype_id'=>$row['unit_type'],
            'uses'=>$row['uses'],
            'floors_number'=>$row['floors_number'],
            'city_id'=>$row['city'],
            'hood_id'=>$row['hood'],
            'postal_code',
            'owner_id',
            'extra_number',
            'building_number',
            'deed_number',
            'electric_meter',
            'sewage_meter',
            'water_meter',
            'address',
            'latitude',
            'longitude',
        ]);
    }*/

    public function collection(Collection $rows)
    {

        Validator::make($rows->toArray(), [
            '*.name' => 'required',
            '*.unit_type' => 'required|numeric',
            '*.city_id' => 'required|numeric',
            '*.hood_id' => 'required|numeric',
            '*.owner_id' => 'required|numeric',
            '*.uses' => 'in:commercial,residential,families,singels,investment',
        ])->validate();

        foreach ($rows as $row) {
            Unit::create([
                'name' => $row['name'],
                'unittype_id' => $row['unit_type'],
                'uses' => $row['uses'],
                'floors_number' => $row['floors_number'],
                'city_id' => $row['city_id'],
                'hood_id'=>$row['hood_id'],
                'postal_code'=>$row['piece_number'],
                'owner_id'=>$row['owner_id'],
                'extra_number'=>$row['aquarium_number'],
                'building_number'=>$row['building_number'],
                'deed_number'=>$row['deed_number'],
                'electric_meter'=>$row['electric_meter'],
                'sewage_meter'=>$row['sewage_meter'],
                'water_meter'=>$row['water_meter'],
                'address'=>$row['address'],
                'latitude'=>$row['latitude'],
                'longitude'=>$row['longitude'],

            ]);
        }
    }

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'UTF-8',
            'delimiter' => ","
        ];
    }

}
