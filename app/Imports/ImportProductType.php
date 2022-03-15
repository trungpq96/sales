<?php

namespace App\Imports;

use App\Models\producttype;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class ImportProductType implements ToModel,WithBatchInserts
{ /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function batchSize(): int
    {
        return 1000;
    }

    public function model(array $row)
    {
        //dd($row);
        //dd($row);
        return new producttype([
            'name_prd_type' => $row[1],
            'description' => $row[2],
            'status' => $row[3],
            //
        ]);
    }
}
