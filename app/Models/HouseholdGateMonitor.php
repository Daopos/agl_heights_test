<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseholdGateMonitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'household_id',
        'in',
        'out',
        'in_img',
        'out_img',
    ];

    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
