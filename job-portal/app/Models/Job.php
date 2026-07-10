<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
   
    protected $table = 'job_listings';

    protected $fillable = [
        'user_id', 'title', 'description', 'category', 'location', 'salary_range', 'type', 'deadline'
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

   
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    

public function category()
{
    return $this->belongsTo(
        \App\Models\Category::class,
        'category',
        'id'
    );
}
public function jobCategory()
{
    return $this->belongsTo(Category::class, 'category', 'id');
}
public function company()
{
    return $this->hasOne(
        CompanyProfile::class,
        'user_id',
        'user_id'
    );
}

public function categoryRelation()
{
    return $this->belongsTo(
        \App\Models\Category::class,
        'category'
    );
}

}