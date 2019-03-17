<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'img_filename', 'about', 'website', 'role_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function course() {
        return $this->belongsToMany('App\Course', 'course_users', 'user_id', 'course_id');
    }

    public function resource() {
        return $this->hasMany('App\Resource');
    }

    public function note() {
        return $this->hasMany('App\Note');
    }

    public function announcement() {
        return $this->hasMany('App\Update');
    }

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function assignment() {
        return $this->hasMany('App\Assignment');
    }
}
