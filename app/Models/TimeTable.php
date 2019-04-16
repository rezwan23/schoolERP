<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    protected $fillable =[
        'class_id', 'time_table'
    ];

    public function collegeClass()
    {
        return $this->belongsTo(CollegeClass::class, 'class_id');
    }
}
