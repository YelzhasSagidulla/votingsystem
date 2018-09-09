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

    public function scopeOrdered($query)
    {
        return $query
            ->orderBy('votes_count', 'DESC')
            ->orderBy('lastname', 'ASC');
    }
}
