<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CandidateProfile;
use App\Models\Job;
use App\Models\JobListing;


class Application extends Model
{
    use HasFactory;

    protected $fillable = [
    'job_id',
    'user_id',
    'expected_salary',
    'status',
    'choice_order',
    'is_shortlisted',
    'interview_message',
    'interview_sent',
    'interview_date',
    'interview_time',
    'interview_location',
    'interview_mail_sent',
    'final_status',
];

   public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function candidateProfile()
    {
        return $this->hasOne(
            CandidateProfile::class,
            'user_id',
            'user_id'
        );
    }
    
}