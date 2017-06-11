<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public $table = 'patient';

    public function corporation(){
        return $this->hasOne(Corporation::class);
    }

    public function medicalhist()
    {
        return $this->belongsToMany(MedicalHist::class);
    }
}
