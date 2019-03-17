<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    protected $guarded = [];

    public function course() {
        return $this->belongsTo('App\Course');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
