<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollegeClass extends Model
{
    protected $table= 'classes';
    protected $fillable = ['name'];

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }

    public function time()
    {
        return $this->hasOne(TimeTable::class, 'class_id');
    }
}
