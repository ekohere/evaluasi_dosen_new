@extends('layouts.app')

@section('content')
    <section class="panel panel-warning">
        <header class="panel-heading">
            <h2 class="panel-title">{{isset($title)?$title:''}}</h2>
        </header>
        <div class="panel-body">

                        <a href="{{ url('admin/hasil_evaluasi_dosen/' . $hasil_evaluasi_dosen->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit hasil_evaluasi_dosen"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/hasil_evaluasi_dosen', $hasil_evaluasi_dosen->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete hasil_evaluasi_dosen',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th class="text-right">ID</th><td>{{ $hasil_evaluasi_dosen->id }}</td>
                                    </tr>
                                    <tr><th> Dosen Id </th><td> {{ $hasil_evaluasi_dosen->dosen_id }} </td></tr><tr><th> Nama Dosen </th><td> {{ $hasil_evaluasi_dosen->nama_dosen }} </td></tr><tr><th> Nama Lengkap Dosen </th><td> {{ $hasil_evaluasi_dosen->nama_lengkap_dosen }} </td></tr><tr><th> Mata Kuliah Id </th><td> {{ $hasil_evaluasi_dosen->mata_kuliah_id }} </td></tr><tr><th> Nama Mata Kuliah </th><td> {{ $hasil_evaluasi_dosen->nama_mata_kuliah }} </td></tr><tr><th> Tahun </th><td> {{ $hasil_evaluasi_dosen->tahun }} </td></tr><tr><th> Mahasiswa Id </th><td> {{ $hasil_evaluasi_dosen->mahasiswa_id }} </td></tr><tr><th> Nama Mahasiswa </th><td> {{ $hasil_evaluasi_dosen->nama_mahasiswa }} </td></tr><tr><th> Nim Mahasiswa </th><td> {{ $hasil_evaluasi_dosen->nim_mahasiswa }} </td></tr><tr><th> Kelas Id </th><td> {{ $hasil_evaluasi_dosen->kelas_id }} </td></tr><tr><th> Nama Kelas </th><td> {{ $hasil_evaluasi_dosen->nama_kelas }} </td></tr><tr><th> Program Studi </th><td> {{ $hasil_evaluasi_dosen->program_studi }} </td></tr><tr><th> Jurusan </th><td> {{ $hasil_evaluasi_dosen->jurusan }} </td></tr><tr><th> Komentar </th><td> {{ $hasil_evaluasi_dosen->komentar }} </td></tr>
                                </tbody>
                            </table>
                        </div>

        </div>
    </section>
@endsection