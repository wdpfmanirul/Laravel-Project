<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    protected $table = 'job_listings';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category',
        'location',
        'salary_range',
        'type',
        'deadline',
        'vacancy'
    ];

    public function employer()
{
    return $this->belongsTo(
        \App\Models\User::class,
        'user_id'
    );
}

public function applications()
{
    return $this->hasMany(
        \App\Models\Application::class,
        'job_id'
    );
}
}