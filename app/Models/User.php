<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'role',
        'project_location_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function location()
    {
        return $this->belongsTo(ProjectLocation::class, 'project_location_id');
    }

    public static function boot()
    {
        parent::boot();
        User::creating(function ($model) {
            $model->setId();
            $model->password = bcrypt('password');
        });
    }

    public function setId()
    {
        $this->attributes['id'] = Str::uuid();
    }

    public function userGreetings()
    {
        $greetings = "";
        $hour = date('H');
        if ($hour >= 18) {
           $greetings = "Good Evening";
        } elseif ($hour >= 12) {
            $greetings = "Good Afternoon";
        } elseif ($hour < 12) {
           $greetings = "Good Morning";
        }

        return $greetings .'! ' .$this->name;
    }

    public function userRole()
    {
        if($this->role == 0){
            return 'User';
        }elseif($this->role == 1){
            return 'Manager';
        }else{
            return 'Admin';
        }
    }

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }

}
