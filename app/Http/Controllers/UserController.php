<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;

class UserController extends Controller
{
    public function mainPage ()
    {
        $events=Event::latest()->paginate(5);

        return view('welcome',compact('events'));
    }

    public function index($id)
    {
        $info=User::latest()->where('id', $id)->get();
        $events=Event::latest()->where('user_id',$id)->paginate(5);
        return view('user.index', compact('info','events'));
    }

    public function edit ($id)
    {
        $info=User::latest()->where('id', $id)->get();
        return view('user.edit',compact('info'));
    }

    public function form($id)
    {
        $uploadfile = "avatars/".$_FILES['somename']['name'];
        move_uploaded_file($_FILES['somename']['tmp_name'], $uploadfile);

        $info=User::find($id);
        $info->photo=$uploadfile;
        $info->save();

        return redirect()->back();



    }


    public function addEvent(Request $request)
    {

//        $file=$request->file('photo_event')->move('photo_events/',$_FILES['photo_event']['name']);


        if (!empty($_FILES['photo_event'])){
            $uploadfile = "photo_events/".$_FILES['photo_event']['name'];
            move_uploaded_file($_FILES['photo_event']['tmp_name'], $uploadfile);
        }


        $id=$request->user();
        $info=Event::find($id['id']);
        $info->link=$uploadfile;
        $info->save();

        $request->user()->events()->create([
            'text' => $request->text,

        ]);

        return redirect()->back();


    }



    public function redirect()
    {
        $r = \Session::get('user_id');

        return \Redirect::route('user', array('id' => $r));
    }
}
