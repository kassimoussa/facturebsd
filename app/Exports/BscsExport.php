<?php

namespace App\Exports;

use App\Models\Bscs;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class BscsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return  Bscs::select('name', DB::raw('count(*) as count'))
        ->groupBy('name')
        ->havingRaw('count(*) > 1')
        ->get();

    }
}
