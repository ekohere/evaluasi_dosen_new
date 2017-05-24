<div class="form-group {{ $errors->has('hasil_evaluasi_dosen_id') ? 'has-error' : ''}}">
    {!! Form::label('hasil_evaluasi_dosen_id', 'Hasil Evaluasi Dosen Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('hasil_evaluasi_dosen_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('hasil_evaluasi_dosen_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('pertanyaan_id') ? 'has-error' : ''}}">
    {!! Form::label('pertanyaan_id', 'Pertanyaan Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('pertanyaan_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('pertanyaan_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('hasil') ? 'has-error' : ''}}">
    {!! Form::label('hasil', 'Hasil', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('hasil', null, ['class' => 'form-control']) !!}
        {!! $errors->first('hasil', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>