@extends('layouts.app')

@section('content')
    <section class="panel panel-warning">
        <header class="panel-heading">
            <h2 class="panel-title">{{isset($title)?$title:''}}</h2>
        </header>
        <div class="panel-body">

                        <a href="{{ url('admin/pertanyaan/' . $pertanyaan->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit pertanyaan"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/pertanyaan', $pertanyaan->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete pertanyaan',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th class="text-right">ID</th><td>{{ $pertanyaan->id }}</td>
                                    </tr>
                                    <tr><th> Pertanyaan </th><td> {{ $pertanyaan->pertanyaan }} </td></tr><tr><th> Pertanyaancol </th><td> {{ $pertanyaan->pertanyaancol }} </td></tr><tr><th> Jenis Pertanyaan Id </th><td> {{ $pertanyaan->jenis_pertanyaan_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

        </div>
    </section>
@endsection