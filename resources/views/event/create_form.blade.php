@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-xs-offset-2 col-xs-8">
            <p class="registr_str">Подробно расскажите о своем путешествии. Наличие красочного фото добавит интерес к
                Вашей
                заметке</p>
        </div>
    </div>
    <div class="row form_otstup">

        {!! Form::open(['class' => 'form-horizontal', 'method'=>'post','route'=>['store_event','id'=>Auth::user()->id], 'enctype'=>'multipart/form-data', 'onSubmit'=>'return validate(this)']) !!}
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {!! Form::label('title', 'Заголовок', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => '', 'maxlength'=>100]) !!}
                    @if ($errors->has('title'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('conten') ? ' has-error' : '' }}">
                {!! Form::label('conten', 'Описание', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::textarea('conten', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                    @if ($errors->has('conten'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('conten') }}</strong>
                                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('photo_event', 'Заглавное фото', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::file('photo_event', null, ['class' => 'form-control']) !!}

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <button type="submit" class="btn btn-success">Создать</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
<script>
    function validate(form) {
        fail = validateTitle(form.title.value)
        fail += validateContent(form.conten.value)
        fail += validatePhoto(form.photo_event.value)

        if (fail == "") return true
        else { swal("Внимание!", fail, "warning"); return false }
    }
</script>
@endsection