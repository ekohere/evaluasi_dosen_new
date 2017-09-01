@extends('layouts.app')

@section('content')

    <section class="panel panel-warning">
        <header class="panel-heading ">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
            </div>
            <h2 class="panel-title">{{isset($title)?$title:'Masukkan Data Evaluasi Dosen'}} ( {{$_GET['dosen_nama']}} - {{$_GET['mk_nama']}} )</h2>
        </header>
        </section>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Error!!</strong> Pastikan data telah terisi dengan benar<br /><br />
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="alert alert-success">
                <h4><b>Harap mengisi evaluasi kinerja dosen dengan sebenar-benarnya sesuai apa yang anda rasakan saat kegiatan pembelajaran.</b></h4>
            </div>

            <div class="alert alert-info">
                <h4><b><center>Pergunakan skala penilaian (skor) berikut ini untuk menjawab setiap pertanyaan; dengan menuliskan nilai skor pada kolom yang sesuai.<br>Sangat Setuju = 5, Setuju = 4, Tidak Tahu = 3, Tidak Setuju = 2, Sangat Tidak Setuju = 1.</center></b></h4>
            </div>

            <style>
                table tr.action{
                    cursor: pointer;
                }

                table tr th{
                    text-align: center;
                }
            </style>

            <script>

                $(document).ready(function(){
                    $('table tr.action').click(function(){
                        window.location = $(this).attr('href');
                        return false;
                    });
                });

            </script>
            {!! Form::open(['url' => '/evaluasi_dosen', 'class' => 'form-horizontal', 'files' => true]) !!}
    {!! Form::hidden ('dosen_id', $_GET['dosen_id']) !!}
    {!! Form::hidden ('nama_dosen', $_GET['dosen_nama']) !!}
    {!! Form::hidden ('nama_lengkap_dosen', $_GET['dosen_nama_lengkap']) !!}
    {!! Form::hidden ('mata_kuliah_id', $_GET['mk_id']) !!}
    {!! Form::hidden ('nama_mata_kuliah', $_GET['mk_nama']) !!}
    {!! Form::hidden ('tahun', Session::get('tahun')) !!}
    {!! Form::hidden ('semester', Session::get('semester')) !!}
    {!! Form::hidden ('mahasiswa_id', Session::get('mahasiswa_id')) !!}
    {!! Form::hidden ('nama_mahasiswa', Session::get('nama_mahasiswa')) !!}
    {!! Form::hidden ('nim_mahasiswa', Session::get('nim')) !!}
    {!! Form::hidden ('kelas_id', $_GET['kelas_id']) !!}
    {!! Form::hidden ('nama_kelas', $_GET['kelas_nama']) !!}
    {!! Form::hidden ('program_studi_id',Session::get('program_studi_id')) !!}
    {!! Form::hidden ('program_studi', Session::get('program_studi')) !!}
    {!! Form::hidden ('jurusan_id',Session::get('jurusan_id')) !!}
    {!! Form::hidden ('jurusan', Session::get('jurusan')) !!}
    {!! Form::hidden ('users_id', Auth::user()->id) !!}


            <div class="row">
                @foreach($jenis_pertanyaan as $item)
                    <div class="col-md-6">
                        <section class="panel panel-info">
                            <header class="panel-heading">
                                <h4 class="panel-title"><b>{{$item->nama_lengkap}}</b></h4>
                            </header><!-- /.box-header -->
                            <div class="panel-body">
                                <table class="table table-no-more table-bordered table-striped mb-none">
                                    <thead>
                                    <tr>
                                        <th rowspan="2">No</th><th rowspan="2">Uraian Kinerja Dosen</th><th colspan="5" >Skor</th>
                                    </tr>
                                    <tr>
                                        <th>1</th><th>2</th><th>3</th><th>4</th><th>5</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($item->listPertanyaan as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td width="400">{{ $item->pertanyaan }}</td>
                                            @for($i = 1; $i <= 5; $i++)
                                            <td>{!! Form::radio('hasil['.$item->id.']', $i, false, ['required','class' => 'form-control mahasiswa_id']) !!}</td>
                                                @endfor
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                @endforeach
                    <div class="col-md-6">
                        <section class="panel panel-info">
                            <header class="panel-heading">
                                <h4 class="panel-title"><b>Komentar, Kritik & Saran</b></h4>
                            </header><!-- /.box-header -->
                            <div class="panel-body">
                                {!! Form::textarea ('komentar', null, ['placeholder'=>'Silahkan isi komentar, kritik & saran kepada dosen yang bersangkutan','required','class' => 'form-control mahasiswa_id']) !!}
                            </div>
                            </section>
                    </div>


            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-4">
                        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Simpan Kuesioner Evaluasi Dosen', ['class' => 'btn btn-lg btn-primary']) !!}
                    </div>
                </div>
            </div>

            {!! Form::close() !!}

             {{--   <table class="table table-no-more table-bordered table-striped mb-none">
                <thead>
                <tr>
                    <th>No</th><th>Uraian Kinerja Dosen</th><th>Skor</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pertanyaan as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->dosen_id }}</td>
                        <td>{{ $item->nama_dosen }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>--}}


@endsection