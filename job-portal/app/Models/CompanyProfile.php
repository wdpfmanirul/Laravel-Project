<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_logo',
        'company_email',
        'company_phone',
        'industry_type',
        'company_size',
        'website',
        'founded_year',
        'division',
        'district',
        'thana',
        'address',
        'mission',
        'vision',
        'description',
        'facebook',
        'linkedin',
        'youtube',
        'total_employees',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobs()
{
    return $this->hasMany(\App\Models\Job::class, 'user_id', 'user_id');
}
}