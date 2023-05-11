<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Traits\HasPermissions;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'nim',
        'study_program_id',
        'role',
        'vote_status',
        'election_id',
        'angkatan'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attribute) => $attribute['first_name'] . ' ' . $attribute['last_name']
        );
    }

    protected function firstName(): Attribute
    {
        return Attribute::make(
            set: fn ($value, $attribute) => ucwords($value)
        );
    }

    protected function lastName(): Attribute
    {
        return Attribute::make(
            set: fn ($value, $attribute) => ucwords($value)
        );
    }

    public function scopeWithAdminFilter(Builder $query, ?int $prodi, ?int $active_status)
    {
        return $query->select('id', 'first_name', 'last_name', 'study_program_id', 'nim', 'vote_status', 'angkatan')
            ->where('study_program_id', $prodi)
            ->orWhere('vote_status', $active_status)
            ->with('study_program')->get();
    }

    public function scopeWithoutAdminFilter(Builder $query)
    {
        return $query
            ->select('id', 'first_name', 'last_name', 'study_program_id', 'nim', 'vote_status', 'angkatan')
            ->with('study_program')
            ->get();
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function study_program()
    {
        return $this->belongsTo(StudyProgram::class);
    }
}
