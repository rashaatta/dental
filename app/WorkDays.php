<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkDays extends Model
{
    //

    public function staff(){
        return $this->belongsToMany(Staff::class);
    }
}
