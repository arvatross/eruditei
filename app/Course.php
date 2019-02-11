<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    
    protected $fillable = ['name', 'description', 'cover_url', 'category', 'slug', 'code'];
    
    public function user() {
        return $this->belongsToMany('App\User', 'course_users', 'course_id', 'user_id');
    }

    public function curriculum() {
        return $this->hasMany('App\Curriculum');
    }
    
    public function getRouteKeyName() {
        return 'slug';
    }
}
