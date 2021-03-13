<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    public $casts = [
        'content' => 'json',
    ];

    public function courses()
    {
        return $this->belongsToMany(Courses::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}