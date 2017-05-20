@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Hasil_evaluasi_dosen_has_pertanyaan</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/hasil_evaluasi_dosen_has_pertanyaan/create') }}" class="btn btn-success btn-sm" title="Add New hasil_evaluasi_dosen_has_pertanyaan">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/hasil_evaluasi_dosen_has_pertanyaan', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Hasil Evaluasi Dosen Id</th><th>Pertanyaan Id</th><th>Hasil</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($hasil_evaluasi_dosen_has_pertanyaan as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->hasil_evaluasi_dosen_id }}</td><td>{{ $item->pertanyaan_id }}</td><td>{{ $item->hasil }}</td>
                                        <td>
                                            <a href="{{ url('/admin/hasil_evaluasi_dosen_has_pertanyaan/' . $item->id) }}" title="View hasil_evaluasi_dosen_has_pertanyaan"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/hasil_evaluasi_dosen_has_pertanyaan/' . $item->id . '/edit') }}" title="Edit hasil_evaluasi_dosen_has_pertanyaan"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/hasil_evaluasi_dosen_has_pertanyaan', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete hasil_evaluasi_dosen_has_pertanyaan',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $hasil_evaluasi_dosen_has_pertanyaan->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
