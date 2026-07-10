<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateExperience extends Model
{
    use HasFactory;

    protected $fillable = [

        'candidate_profile_id',

        'company_name',
        'job_title',
        'employment_type',
        'start_date',
        'end_date',
        'currently_working',
        'responsibilities',
    ];

    public function profile()
    {
        return $this->belongsTo(CandidateProfile::class, 'candidate_profile_id');
    }
}