<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [
        'id'
    ];

    public function scopeOnlyPeriods(Builder $query)
    {
        return $query->select('organization_period as period')->distinct();
    }

    public function scopeOfPeriod(Builder $query, string $period)
    {
        return $query->where('organization_period', $period);
    }
}
