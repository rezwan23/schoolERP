<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmsGroup extends Model
{
    protected $fillable = [
        'group_name'
    ];
    public function members()
    {
        return $this->hasMany(SmsGroupMember::class, 'sms_group_id');
    }
}
