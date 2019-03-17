<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['title', 'content', 'cover_url', 'user_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
