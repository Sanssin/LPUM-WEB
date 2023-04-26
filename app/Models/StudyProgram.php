<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyProgram extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'study_program_name'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
