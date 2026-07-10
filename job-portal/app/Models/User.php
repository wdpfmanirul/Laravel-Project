<?php

namespace App\Models;


use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    
    use HasFactory, Notifiable;
    use Notifiable;
   
    protected $fillable = [
    'name',
    'email',
    'password',
    'role', 
];

    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function candidateProfile()
{
    return $this->hasOne(CandidateProfile::class);
}
public function savedJobs()
{
    return $this->hasMany(\App\Models\SavedJob::class);
}

public function profile()
{
    return $this->hasOne(CandidateProfile::class);
}

public function companyProfile()
{
    return $this->hasOne(CompanyProfile::class);
}
}
