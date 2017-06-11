<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalHist extends Model
{
    //
    protected $table = 'medical_hist';

    public function patient(){
        return $this->belongsToMany(Patient::class);
    }
}
