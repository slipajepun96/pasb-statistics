<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Estate;

class Budget extends Model
{
    use HasFactory;
    protected $fillable = [
        'year',
        'estate_id',
        'jan_budget_mt',
        'feb_budget_mt',
        'mac_budget_mt',
        'apr_budget_mt',
        'may_budget_mt',
        'june_budget_mt',
        'july_budget_mt',
        'aug_budget_mt',
        'sept_budget_mt',
        'oct_budget_mt',
        'nov_budget_mt',
        'dec_budget_mt',
        'jan_daily_budget_mt',
        'feb_daily_budget_mt',
        'mac_daily_budget_mt',
        'apr_daily_budget_mt',
        'may_daily_budget_mt',
        'june_daily_budget_mt',
        'july_daily_budget_mt',
        'aug_daily_budget_mt',
        'sept_daily_budget_mt',
        'oct_daily_budget_mt',
        'nov_daily_budget_mt',
        'dec_daily_budget_mt'
    ];

    public function estate()
    {
        return $this->belongsTo(Estate::class);
    }
}
