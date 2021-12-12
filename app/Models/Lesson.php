<?php

namespace App\Models;

use App\Traits\LessonLearnTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory, LessonLearnTraits;

    protected $dates = ['date_raised'];

    protected $fillable = [
        'user_id',
        'project_location_id',
        'desc_category',
        'date_raised',
        'event',
        'lesson_category',
        'warning_signs',
        'recommendations',
        'action',
        'owner',
        'wbs_id',
        'status',
        'risk_level',
        'attachment',
        'images',
        'comments',
    ];

    public function location()
    {
        return $this->belongsTo(ProjectLocation::class, 'project_location_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lessonStatus()
    {
        if($this->status == 0) {
            return "Pending Review";
        }elseif($this->status == 1){
            return "Revision Required";
        }else{
            return "Approved";
        }
    }
}
