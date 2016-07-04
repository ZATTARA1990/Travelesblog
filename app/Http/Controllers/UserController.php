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

        if ($info->isEmpty()){
            abort(404);
        }
        $events=Event::latest()->where('user_id',$id)->paginate(5);
        return view('user.index', compact('info','events'));
    }

    public function editUser ($id)
    {
        $info=User::latest()->where('id', $id)->get();
        return view('user.edit',compact('info'));
    }

    public function form($id)
    {
        $uploadfile = "avatars/".$_FILES['somename']['name'];
        move_uploaded_file($_FILES['somename']['tmp_name'], $uploadfile);

        $info=User::find($id);
        $info->photo='/'.$uploadfile;
        $info->save();

        return redirect()->back();

    }

    public function redirect()
    {
        $r = \Session::get('user_id');

        return \Redirect::route('user', array('id' => $r));
    }
}
