<?php

namespace App\Exports;

use App\Models\producttype;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportProductType implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return producttype ::all();
    }
}
