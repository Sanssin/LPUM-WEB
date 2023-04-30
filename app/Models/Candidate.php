<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'election_id',
        'leader_id',
        'coleader_id',
        'user_id',
        'number',
        'position',
        'vision',
        'mission',
        'slogan',
        'candidate_image',
        'lead_position',
        'colead_position'
    ];

    public function election()
    {
        return $this->belongsTo(Election::class);
    }

    public function leader()
    {
        return $this->belongsTo(User::class, 'leader_id', 'id');
    }

    public function coleader()
    {
        return $this->belongsTo(User::class, 'coleader_id', 'id');
    }

    public function scopeInElection($query, $election_id)
    {
        return $query->where('election_id', $election_id)->with(['leader', 'coleader'])->orderBy('number')->get();
    }
}
