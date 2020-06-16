<?php

namespace App\Exports;

use App\Catalog;
use Maatwebsite\Excel\Concerns\FromCollection;

class CatalogExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Catalog::all();
    }
}
