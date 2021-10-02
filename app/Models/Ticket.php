<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'comment',
        'state',
        'user_stories_id',
    ];

    public function userStory()
    {
        return $this->belongsTo(UserStory::class);
    }
}
