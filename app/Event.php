<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'short_description', 'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}