<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateProfile extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',        
    'district',
    'thana',
    'post_office',
    'permanent_address',       
    'user_id',
    'district',
    'thana',
    'post_office',
    'present_address', 
    'father_name',
    'mother_name',
    'phone',
    'alternate_mobile',
    'age',
    'date_of_birth',
    'gender',
    'nationality',
    'marital_status',
    'photo',        
    'headline',
    'bio',
    'current_location',
    'current_job_title',
    'experience_level',
    'expected_salary',
    'preferred_job_type',
    'preferred_location',   
    'skills',
    'education',   
    'photo',
    'cv',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function educations()
    {
        return $this->hasMany(CandidateEducation::class, 'candidate_profile_id');
    }

    public function experiences()
    {
        return $this->hasMany(CandidateExperience::class, 'candidate_profile_id');
    }

    
    public function documents()
    {
        return $this->hasMany(CandidateDocument::class, 'candidate_profile_id');
    }

    
    public function trainings()
    {
        return $this->hasMany(CandidateTraining::class, 'candidate_profile_id');
    }
}