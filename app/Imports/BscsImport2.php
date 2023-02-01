<?php

namespace App\Imports;

use App\Models\Bscs;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BscsImport2 implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $name = $row['name'];
       // $path = "storage/bscs/" . $name;

        return Bscs::where('name', $name)->delete();
    }
}
