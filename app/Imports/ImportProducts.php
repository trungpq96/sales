<?php

namespace App\Imports;

use App\Models\product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class ImportProducts implements ToModel,WithBatchInserts
{
    /**
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
        return new product([
            'name_prd' => $row[1],
            'image_prd' => $row[2],
            'prd_type_id' => $row[3],
            'price' =>$row[4],
            'price_sale' =>$row[5],
            'status' =>$row[6],
            //
        ]);
    }
}
