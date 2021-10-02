<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'company_id',
        'password',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function userStories()
    {
        return $this->hasMany(UserStory::class,'project_id');
    }
}
