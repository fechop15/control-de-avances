<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'nit',
        'phone',
        'phone',
        'address',
        'email',
    ];

    public function projets()
    {
        return $this->hasMany(Project::class,'company_id');
    }
}
