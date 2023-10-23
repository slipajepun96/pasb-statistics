<?php

namespace App\Imports;

use App\Models\DailyYield;
use Maatwebsite\Excel\Concerns\ToModel;

class FFBDailyYieldImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DailyYield([
            //
        ]);
    }
}
