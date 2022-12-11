<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CumulativeFfb extends Model
{
    use HasFactory;
    protected $fillable = [
        'year',
        'month',
        'estate_id',
        'cumulative_ffb_mt',
        'latest_ffb_date'
    ];

}
