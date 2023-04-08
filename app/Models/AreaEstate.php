<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estate;

class AreaEstate extends Model
{
    use HasFactory;
    protected $fillable = [
        'year',
        'total_area',
        'estate_id',
        'planted_area',
        'matured_area',
        'immatured_area',
        'month_active_from',
        'month_active_to'
    ];

    public function estate()
    {
        return $this->belongsTo(Estate::class);
    }
}
