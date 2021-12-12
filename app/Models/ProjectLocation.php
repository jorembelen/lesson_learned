<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit_code',
        'location',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }

}
