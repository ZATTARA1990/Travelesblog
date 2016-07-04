<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\Comment;

use App\Http\Requests;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\App;
use Intervention\Image\ImageManager;

class EventController extends Controller
{
    public function createEvent()
    {

        return view('event.create_form');
    }

    public function storeEvent($id, EventRequest $request)

    {
//        $manager = new ImageManager(array('driver' => 'imagick'));
        if ($request->hasFile('photo_event')) //Проверяем была ли передана картинка, ведь статья может быть и без картинки.
        {
//            $date = date('d.m.Y'); //опеределяем текущую дату, она же будет именем каталога для картинок
            $root = "photo_events";
//            $root = $_SERVER['DOCUMENT_ROOT'] . "/photo_events/"; // это корневая папка для загрузки картинок
//            if(!file_exists($root.$date))    {mkdir($root);} // если папка с датой не существует, то создаем ее
            $f_name = $request->file('photo_event')->getClientOriginalName();//определяем имя файла
            $request->file('photo_event')->move($root, $f_name); //перемещаем файл в папку с оригинальным именем
            $all = $request->all(); //в переменой $all будет массив, который содержит все введенные данные в форме
            $all['photo_event'] = "/photo_events/" . $f_name;// меняем значение preview на нашу ссылку, иначе в базу попадет что-то вроде /tmp/sdfWEsf.tmp

            preg_match('/[^.]+/',$request->conten,$m);
//            $str=str_split($request->conten,100);

            $request->user()->events()->create([
                'title' => $request->title,
                'short_description'=>$m[0],
                'content' => $request->conten,
                'link' => $all['photo_event'],
            ]);

        } else {
            $request->user()->events()->create([
                'title' => $request->title,
                'content' => $request->conten,
            ]); // если картинка не передана, то сохраняем запрос, как есть.
        }

        flash('Успеx', 'Новость ' . array_get($request, 'title') . ' добавлена');

        return \Redirect::route('user', array('id' => $id));
    }

    public function viewEvent($event_id)
    {
        $comments = Comment::latest()->where('event_id', $event_id)->get();
        $events = Event::latest()->where('id', $event_id)->get();
        if ($events->isEmpty()){
            abort(404);
        }

        return view('event.view', compact('events','comments'));
    }

    public function editEvent(Event $event)
    {
//        $event = Event::find($event_id);
        return view('event.edit_form', compact('event'));
    }

    public function updateEvent($user_id, $event_id, Request $request)
    {
        if ($request->hasFile('photo_event')) //Проверяем была ли передана картинка, ведь статья может быть и без картинки.
        {
            $event = Event::find($event_id);
            $f_name = $request->file('photo_event')->getClientOriginalName();//определяем имя файла
            $request->file('photo_event')->move("photo_events", $f_name); //перемещаем файл в папку с оригинальным именем
            $all = $request->all(); //в переменой $all будет массив, который содержит все введенные данные в форме
            $all['photo_event'] = "/photo_events/" . $f_name;// меняем значение preview на нашу ссылку, иначе в базу попадет что-то вроде /tmp/sdfWEsf.tmp

            $event->update($all);
            $event->link = $all['photo_event'];
            $event->save();
        }else{
            $event = Event::find($event_id);
            $event->update($request->all());

        }


        flash('Успеx', 'Новость ' . $event->title . ' обновлена');

        return \Redirect::route('user', array('id' => $user_id));
    }

    public function delEvent(Event $event)
    {
        $this->authorize('delEvent',$event);
        $event->delete();
        return redirect()->back();

    }
}
