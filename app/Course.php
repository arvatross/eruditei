<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    
    protected $fillable = ['name', 'description', 'cover_url', 'category', 'slug', 'code', 'user_id'];
    
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function curriculum() {
        return $this->hasMany('App\Curriculum');
    }

    public function studentu() {
        return $this->belongsToMany('App\Course', 'course_users');
    }
    
    public function getRouteKeyName() {
        return 'slug';
    }
}
