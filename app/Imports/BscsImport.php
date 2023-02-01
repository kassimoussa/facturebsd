<?php

namespace App\Imports;

use App\Models\Bscs;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class BscsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $name = $row['name'];
        $path = "storage/bscs/" . $name;;
        return Bscs::firstOrCreate(['name' => $name, "path" => $path]);
        /* if (Bscs::where('name', $name)->exists()) {
            Bscs::where('name', $name)
            ->update([ 
                "path" => $path]);
        } else {
            $bscs = new Bscs();
            $bscs->name = $name;
            $bscs->path = $path;
            $bscs->save(); 
            return new Bscs([
                "name" => $name,
                "path" => $path
            ]);
        } */
        
    }

    public function chunkSize(): int
    {
        return 50;
    }
}
