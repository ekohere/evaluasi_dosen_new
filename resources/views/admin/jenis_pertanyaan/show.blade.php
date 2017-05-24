@extends('layouts.app')

@section('content')
    <section class="panel panel-warning">
        <header class="panel-heading">
            <h2 class="panel-title">{{isset($title)?$title:''}}</h2>
        </header>
        <div class="panel-body">

                        <a href="{{ url('admin/jenis_pertanyaan/' . $jenis_pertanyaan->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit jenis_pertanyaan"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/jenis_pertanyaan', $jenis_pertanyaan->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete jenis_pertanyaan',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th class="text-right">ID</th><td>{{ $jenis_pertanyaan->id }}</td>
                                    </tr>
                                    <tr><th> Nama </th><td> {{ $jenis_pertanyaan->nama }} </td></tr><tr><th> Singkatan </th><td> {{ $jenis_pertanyaan->singkatan }} </td></tr>
                                </tbody>
                            </table>
                        </div>

        </div>
    </section>
@endsection