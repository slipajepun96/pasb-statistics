<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Estate;

class DailyYield extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'estate_id',
        'ffb_mt',
        'user_id',
        'month',
        'year'
    ];

    public function estate()
    {
        return $this->belongsTo(Estate::class);
    }
}
