<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateResume extends Model
{
    protected $fillable = [

        'user_id',
        'resume_title',
        'resume_file',
        'is_default',

        'career_objective',
        'work_experience',
        'education',
        'skills',
        'certifications',
        'languages',
        'projects',
        'references',

    ];
}