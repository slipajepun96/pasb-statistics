<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\DailyYield;
use App\Models\Budget;
use App\Models\AreaEstate;

class Estate extends Model
{
    use HasFactory;
    protected $fillable = [
        'estate_name',
        'manager_name',
        'year',
        'total_area',
        'planted_area',
        'matured_area',
        'inmatured_area',
        'abbreviation',
        'plant_type'
    ];

    public function dailyyield()
    {
        return $this->hasMany(DailyYield::class);
    }

    public function budget()
    {
        return $this->hasMany(Budget::class);
    }

    public function areaestate()
    {
        return $this->hasMany(AreaEstate::class);
    }
}
