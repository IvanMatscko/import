<?php

namespace App\Imports;

use App\Catalog;
use Maatwebsite\Excel\Concerns\ToModel;

class CatalogImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Catalog([
            'rubric' =>$row[1],
            'categories' =>$row[2],
            'brand' =>$row[3],
            'product_name' =>$row[4],
            'code' =>$row[5],
            'description' =>$row[6],
            'price' =>$row[7],
            'guarantee' =>$row[8],
            'availability' =>$row[9],

        ]);
    }
}
