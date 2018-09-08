<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable=['candidate_id','browser','device','ip_address'];

    public function candidate()
    {
        return $this->belongsTo('App\Candidate');
    }
}
