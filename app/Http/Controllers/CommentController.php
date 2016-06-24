<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Event;
use Illuminate\Http\Request;

use App\Http\Requests;

class CommentController extends Controller
{
    public function viewComment(Event $event)
    {
        $comment = Comment::latest()->where('event_id', $event->id)->get();
        return $comment;
    }

    public function addComment(Event $event, Comment $comment, Request $request)
    {

        $comment->comment = $request->comment;
        $comment->user_id = $request->user()->id;
        $comment->event_id = $event->id;
        $comment->save();

        return redirect()->back();
    }
}
