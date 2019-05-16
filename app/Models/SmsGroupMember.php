<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmsGroupMember extends Model
{
    protected $fillable = [
        'name', 'sms_group_id', 'phone_no'
    ];

    public function group()
    {
        return $this->belongsTo(SmsGroup::class, 'sms_group_id');
    }
}
