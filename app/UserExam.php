<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserExam extends Model
{
    public $table = 'user_exams';
    protected $fillable = [
        'user_id', 'score', 'take', 'remarks','pet_id'
    ];
}
