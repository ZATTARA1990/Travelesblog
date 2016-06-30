@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-xs-offset-2 col-xs-8">
            <p class="registr_str">Редактирование</p>
        </div>
    </div>
    <div class="row form_otstup">
        {!! Form::model($event,['class' => 'form-horizontal','enctype'=>'multipart/form-data', 'method'=>'put','route'=>['update_event','event_id'=>$event->id,'user_id'=>$event->user_id],'onSubmit'=>'return validate(this)']) !!}
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            {!! Form::label('title', 'Title', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                @if ($errors->has('title'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
            {!! Form::label('content', 'Описание', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                @if ($errors->has('content'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('photo_event', 'Фото', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::file('photo_event', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-6">
                <button type="submit" class="btn btn-success">Обновить</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script>
        function validate(form) {
            fail = validateTitle(form.title.value)
            fail += validateContent(form.content.value)
            fail += validatePhoto(form.photo_event.value)

            if (fail == "") return true
            else { swal("Внимание!", fail, "warning"); return false }
        }
    </script>
@endsection