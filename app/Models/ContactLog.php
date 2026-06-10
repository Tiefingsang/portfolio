<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactLog extends Model
{
    protected $fillable = [
        'ip_address', 'email', 'action', 'is_blocked', 'user_agent'
    ];
}
