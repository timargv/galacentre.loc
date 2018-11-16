<?php

namespace App\Imports;

use App\ProductImport;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{


    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ProductImport([
            //
            'name'  => $row[0],
            'email' => $row[1],
        ]);
    }
}
