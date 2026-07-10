<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateTraining extends Model
{
    use HasFactory;

    
    protected $table = 'candidate_trainings';

    
    protected $fillable = [
        'candidate_profile_id',
        'training_title',
        'institution',
        'duration',
        'passing_year',
    ];

   
    public function profile()
    {
        return $this->belongsTo(CandidateProfile::class, 'candidate_profile_id');
    }
}