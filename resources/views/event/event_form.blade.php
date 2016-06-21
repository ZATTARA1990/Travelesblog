<div class="form-group">
    {!! Form::label('title', 'Title', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => '']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('short_description', 'Короткое описание', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('short_description', null, ['class' => 'form-control', 'placeholder' => '']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('content', 'Описание', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => '']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">{{ $btnText or 'Создать' }}</button>
    </div>
</div>