<?php

namespace App\Models;

use App\Enums\VoteStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Election extends Model
{
    use HasFactory;

    public $timestamps = false;

    // protected $casts = [
    //     'election_status' => VoteStatus::class
    // ];

    protected $fillable = [
        'election_name',
        'election_period',
        'start_election',
        'end_election',
        'election_status',
        'election_image',
        'description'
    ];

    protected $dates = ['start_election', 'end_election'];

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attribute) => $attribute['election_name'] . ' - ' . $attribute['election_period']
        );
    }

    public function event()
    {
        // return $this->belongsToMany(Event::class)->withPivot('start_event', 'end_event')->as('agenda');
        return $this->belongsToMany(Event::class)
            ->using(ElectionEvent::class)
            ->withPivot(['start_event', 'end_event', 'method', 'location', 'description'])
            ->as('agenda')
            ->orderByPivot('event_id', 'asc');
    }

    public function voteTime()
    {
        return $this->belongsToMany(Event::class)
            ->using(ElectionEvent::class)
            ->withPivot(['start_event', 'end_event'])
            ->wherePivot('event_id', '=', 9)
            ->as('agenda');
    }

    public function resultTime()
    {
        return $this->belongsToMany(Event::class)
            ->using(ElectionEvent::class)
            ->withPivot(['start_event', 'end_event'])
            ->wherePivot('event_id', '=', 10)
            ->as('agenda');
    }

    public function candidate()
    {
        return $this->hasMany(Candidate::class);
    }

    public function vote_stats()
    {
        return $this->hasOne(VoteStat::class);
    }

    public function scopeOfStatus(Builder $query, string $status)
    {
        return $query->where('election_status', $status);
    }
}
