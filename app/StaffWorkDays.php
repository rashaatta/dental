<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffWorkDays extends Model
{
    //

    public function work_days(){
        return $this->belongsToMany(WorkDays::class);
    }

    public function staff(){
        return $this->belongsToMany(Staff::class);
    }

}
