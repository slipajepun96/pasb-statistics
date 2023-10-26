<?php

namespace App\Imports;

use App\Models\DailyYield;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FFBDailyYieldImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new DailyYield([
            'date' => $row['date'],
            'estate_id' => $row['estate_id'],
            'ffb_mt' => $row['ffb_mt'],
            'user_id' => 3,
            'month' => $row['month'],
            'year' =>$row['year'],
        ]);
    }

    public function batchSize():int
    {
        return 300;
    }
}
