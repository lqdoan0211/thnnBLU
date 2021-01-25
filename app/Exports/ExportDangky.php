<?php

namespace App\Exports;

use App\dangky;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDangky implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return dangky::all();
    }
}
