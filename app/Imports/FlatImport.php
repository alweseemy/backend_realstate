<?php

namespace App\Imports;

use App\Models\Flat;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Validator;

class FlatImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {

        Validator::make($rows->toArray(), [
            '*.unit_id' => 'required',
            '*.flat_type_id' => 'required',
            '*.flat_number' => 'required',
            '*.area' => 'required',
        ])->validate();

        foreach ($rows as $row) {
            Flat::create([
                'unit_id' => $row['unit_id'],
                'flat_type_id' => $row['flat_type_id'],
                'unit_number' => $row['flat_number'],
                'area' => $row['area'],
                'electric' => $row['electric_meter'],
                'water'=>$row['water_meter'],
                'room'=>$row['room'],
                'hall'=>$row['hall'],
                'bathroom'=>$row['bathroom'],
                'floor'=>$row['floor'],


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
