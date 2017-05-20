@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Hasil_evaluasi_dosen</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/hasil_evaluasi_dosen/create') }}" class="btn btn-success btn-sm" title="Add New hasil_evaluasi_dosen">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/hasil_evaluasi_dosen', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>ID</th><th>Dosen Id</th><th>Nama Dosen</th><th>Nama Lengkap Dosen</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($hasil_evaluasi_dosen as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->dosen_id }}</td><td>{{ $item->nama_dosen }}</td><td>{{ $item->nama_lengkap_dosen }}</td>
                                        <td>
                                            <a href="{{ url('/admin/hasil_evaluasi_dosen/' . $item->id) }}" title="View hasil_evaluasi_dosen"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/hasil_evaluasi_dosen/' . $item->id . '/edit') }}" title="Edit hasil_evaluasi_dosen"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/hasil_evaluasi_dosen', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete hasil_evaluasi_dosen',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $hasil_evaluasi_dosen->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
