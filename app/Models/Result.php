<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'class_id', 'result'
    ];

    public function collegeClass()
    {
        return $this->belongsTo(CollegeClass::class, 'class_id');
    }
}
