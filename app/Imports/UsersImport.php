<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Validator;

class UsersImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {

        Validator::make($rows->toArray(), [
            '*.name' => 'required',
            //'*.email' => 'required|email',
            '*.type' => 'required|in:guard,owner,user',
        ])->validate();

        foreach ($rows as $row) {
            User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'passport_id' => $row['passport_id'],
                'nationality' => $row['nationality'],
                'id_number'=>$row['identity_number'],
                'type'=>$row['type'],


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
