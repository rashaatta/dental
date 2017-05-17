<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Specialty;

class Staff extends Model
{
    //
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function work_days()
    {
        return $this->belongsToMany(WorkDays::class);
    }

    public function speciality()
    {
        return $this->belongsTo(Specialty::class);
    }

}
