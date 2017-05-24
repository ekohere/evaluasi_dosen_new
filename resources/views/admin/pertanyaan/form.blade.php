<div class="form-group {{ $errors->has('pertanyaan') ? 'has-error' : ''}}">
    {!! Form::label('pertanyaan', 'Pertanyaan', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('pertanyaan', null, ['class' => 'form-control']) !!}
        {!! $errors->first('pertanyaan', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('jenis_pertanyaan_id') ? 'has-error' : ''}}">
    {!! Form::label('jenis_pertanyaan_id', 'Jenis Pertanyaan Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('jenis_pertanyaan_id', $listJenisPertanyaan,null, ['class' => 'form-control']) !!}
        {!! $errors->first('jenis_pertanyaan_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>