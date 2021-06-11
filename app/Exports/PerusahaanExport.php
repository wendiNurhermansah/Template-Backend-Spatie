<?php

namespace App\Exports;

use App\Models/data_perusahaan;
use Maatwebsite\Excel\Concerns\FromCollection;

class PerusahaanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return data_perusahaan::all();
    }
}
