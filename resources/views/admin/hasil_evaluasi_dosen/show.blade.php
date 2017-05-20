@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">hasil_evaluasi_dosen {{ $hasil_evaluasi_dosen->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/hasil_evaluasi_dosen') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/hasil_evaluasi_dosen/' . $hasil_evaluasi_dosen->id . '/edit') }}" title="Edit hasil_evaluasi_dosen"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/hasil_evaluasi_dosen', $hasil_evaluasi_dosen->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
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
                                        <th>ID</th><td>{{ $hasil_evaluasi_dosen->id }}</td>
                                    </tr>
                                    <tr><th> Dosen Id </th><td> {{ $hasil_evaluasi_dosen->dosen_id }} </td></tr><tr><th> Nama Dosen </th><td> {{ $hasil_evaluasi_dosen->nama_dosen }} </td></tr><tr><th> Nama Lengkap Dosen </th><td> {{ $hasil_evaluasi_dosen->nama_lengkap_dosen }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
