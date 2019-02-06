<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'first_choice', 'second_choice', 'third_choice', 'fourth_choice', 'answer'
    ];
}
