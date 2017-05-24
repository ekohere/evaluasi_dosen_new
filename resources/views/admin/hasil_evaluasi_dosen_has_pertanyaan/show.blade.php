@extends('layouts.app')

@section('content')
    <section class="panel panel-warning">
        <header class="panel-heading">
            <h2 class="panel-title">{{isset($title)?$title:''}}</h2>
        </header>
        <div class="panel-body">

                        <a href="{{ url('admin/hasil_evaluasi_dosen_has_pertanyaan/' . $hasil_evaluasi_dosen_has_pertanyaan->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit hasil_evaluasi_dosen_has_pertanyaan"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/hasil_evaluasi_dosen_has_pertanyaan', $hasil_evaluasi_dosen_has_pertanyaan->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete hasil_evaluasi_dosen_has_pertanyaan',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th class="text-right">ID</th><td>{{ $hasil_evaluasi_dosen_has_pertanyaan->id }}</td>
                                    </tr>
                                    <tr><th> Hasil Evaluasi Dosen Id </th><td> {{ $hasil_evaluasi_dosen_has_pertanyaan->hasil_evaluasi_dosen_id }} </td></tr><tr><th> Pertanyaan Id </th><td> {{ $hasil_evaluasi_dosen_has_pertanyaan->pertanyaan_id }} </td></tr><tr><th> Hasil </th><td> {{ $hasil_evaluasi_dosen_has_pertanyaan->hasil }} </td></tr>
                                </tbody>
                            </table>
                        </div>

        </div>
    </section>
@endsection