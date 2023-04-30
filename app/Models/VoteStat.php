<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteStat extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function election()
    {
        return $this->belongsTo(Election::class);
    }
}
