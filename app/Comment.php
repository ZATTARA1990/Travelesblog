<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable =
        [
            'id','user_id','event_id','comment',
        ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
//    public function event()
//    {
//        return $this->belongsTo(Event::class);
//    }
}
