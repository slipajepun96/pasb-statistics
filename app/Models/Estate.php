<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
