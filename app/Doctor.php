<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    public $table = 'doctors';

    protected $fillable = [
        'first_name', 'last_name', 'gender', 'image', 'specialization_id','user_id'
    ];

    public function specialization ()
    {
        return $this->belongsTo('App\Specialization', 'specialization_id');
    }

    public function user ()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
