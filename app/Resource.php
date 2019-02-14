<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = ['file_name', 'file_url', 'file_type', 'file_size', 'user_id', 'course_id'];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
