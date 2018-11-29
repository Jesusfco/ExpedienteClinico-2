<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id', 'user_type', 'title', 'description', 'type', 'url', 'read'

    ];
}
