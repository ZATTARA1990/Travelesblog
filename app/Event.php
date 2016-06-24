<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'short_description', 'content','link'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
//    public function comment()
//    {
//        return $this->hasMany(Comment::class);
//    }
}
