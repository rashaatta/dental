<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corporation extends Model
{
    public $table = 'corporation';

    public function patient(){
        return $this->belongsToMany(Patient::class);
    }
}
