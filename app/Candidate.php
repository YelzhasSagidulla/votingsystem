<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{

    protected $fillable = ['firstname','lastname','patronymic'];

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }
}
