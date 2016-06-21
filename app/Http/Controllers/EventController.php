<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;

class EventController extends Controller
{
    public function createEvent()
    {

       return view('event.create_form');
    }
    public function storeEvent($id,Request $request)
    {
        $request->user()->events()->create([
            'title' => $request->title,
            'short_description'=>$request->short_description,
            'content'=>$request->conten,
        ]);

        flash('Успеx', 'Новость ' . array_get($request, 'title') . ' добавлена');

        return \Redirect::route('user', array('id' => $id));
    }
    public function viewEvent($event_id)
    {
        $events=Event::latest()->where('id',$event_id)->get();
        return view('event.view',compact('events'));
    }
}
