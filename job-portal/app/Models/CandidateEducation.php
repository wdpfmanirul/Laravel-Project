<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateEducation extends Model
{
    use HasFactory;

    protected $table = 'candidate_educations';

    protected $fillable = [
        'candidate_profile_id',

        'qualification_level',
        'group_subject',
        'institution_name',
        'board_university',
        'passing_year',
        'roll_registration',
        'cgpa_grade',
    ];

    
    public function profile()
    {
        return $this->belongsTo(
            CandidateProfile::class,
            'candidate_profile_id'
        );
    }
}