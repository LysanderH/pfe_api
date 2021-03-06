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

    public $fillable = [
        'title',
        'content',
        'user_id'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function tactics()
    {
        return $this->belongsToMany(Tactic::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
