<?php

namespace App\Imports;

use App\Models\Bscs;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class BscsImport2 implements ToCollection, WithChunkReading
{ 
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Bscs::where('name', @$row[0])->delete();
        }
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
