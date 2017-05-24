<div class="form-group {{ $errors->has('dosen_id') ? 'has-error' : ''}}">
    {!! Form::label('dosen_id', 'Dosen Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('dosen_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('dosen_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nama_dosen') ? 'has-error' : ''}}">
    {!! Form::label('nama_dosen', 'Nama Dosen', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nama_dosen', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nama_dosen', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nama_lengkap_dosen') ? 'has-error' : ''}}">
    {!! Form::label('nama_lengkap_dosen', 'Nama Lengkap Dosen', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nama_lengkap_dosen', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nama_lengkap_dosen', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('mata_kuliah_id') ? 'has-error' : ''}}">
    {!! Form::label('mata_kuliah_id', 'Mata Kuliah Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('mata_kuliah_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('mata_kuliah_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nama_mata_kuliah') ? 'has-error' : ''}}">
    {!! Form::label('nama_mata_kuliah', 'Nama Mata Kuliah', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nama_mata_kuliah', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nama_mata_kuliah', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tahun') ? 'has-error' : ''}}">
    {!! Form::label('tahun', 'Tahun', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('tahun', null, ['class' => 'form-control']) !!}
        {!! $errors->first('tahun', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('mahasiswa_id') ? 'has-error' : ''}}">
    {!! Form::label('mahasiswa_id', 'Mahasiswa Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('mahasiswa_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('mahasiswa_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nama_mahasiswa') ? 'has-error' : ''}}">
    {!! Form::label('nama_mahasiswa', 'Nama Mahasiswa', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nama_mahasiswa', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nama_mahasiswa', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nim_mahasiswa') ? 'has-error' : ''}}">
    {!! Form::label('nim_mahasiswa', 'Nim Mahasiswa', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nim_mahasiswa', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nim_mahasiswa', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('kelas_id') ? 'has-error' : ''}}">
    {!! Form::label('kelas_id', 'Kelas Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('kelas_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('kelas_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nama_kelas') ? 'has-error' : ''}}">
    {!! Form::label('nama_kelas', 'Nama Kelas', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nama_kelas', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nama_kelas', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('program_studi') ? 'has-error' : ''}}">
    {!! Form::label('program_studi', 'Program Studi', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('program_studi', null, ['class' => 'form-control']) !!}
        {!! $errors->first('program_studi', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('jurusan') ? 'has-error' : ''}}">
    {!! Form::label('jurusan', 'Jurusan', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('jurusan', null, ['class' => 'form-control']) !!}
        {!! $errors->first('jurusan', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('komentar') ? 'has-error' : ''}}">
    {!! Form::label('komentar', 'Komentar', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('komentar', null, ['class' => 'form-control']) !!}
        {!! $errors->first('komentar', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>