<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'description',
        'user_id'
    ];

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
