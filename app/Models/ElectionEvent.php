<?php

namespace App\Models;

use App\Enums\AgendaMethod;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ElectionEvent extends Pivot
{
    use HasFactory;

    protected $dates = [
        'start_event',
        'end_event'
    ];

    protected $fillable = [
        'start_event',
        'end_event',
        'method',
        'location',
        'description'
    ];

    // protected $casts = [
    //     'method' => AgendaMethod::class
    // ];

    public function election()
    {
        return $this->belongsTo(Election::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
