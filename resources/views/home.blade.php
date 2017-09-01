@extends('layouts.app')

@section('content')

    <section class="panel panel-warning">
        <header class="panel-heading ">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
            </div>
            <h2 class="panel-title">{{isset($title)?$title:'Masukkan Data Evaluasi Dosen'}}</h2>
        </header>
        <div class="panel-body">
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

                <div class="alert alert-info">
                    <p><b>Pilihlah salah satu mata kuliah dan dosen pengajar mata kuliah.</b></p>
                </div>

                <style>
                    table tr.action{
                        cursor: pointer;
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

            <table class="table table-no-more table-bordered table-striped mb-none">
                <thead>
                <tr>
                    <th>No</th><th>Nama Mata Kuliah</th><th>Nama Dosen</th><th>
                </tr>
                </thead>
                <tbody>
                <?php $number=1; ?>
                @foreach($mata_kuliah_dosen as $item)
                    @foreach($item['dosen'] as $dosen)
                        <tr class="action" href="evaluasi_dosen?mk_id={{$item['mata_kuliah_id']}}&mk_nama={{ $item['mata_kuliah_nama'] }}&dosen_id={{ $dosen['id'] }}&dosen_nama={{ $dosen['nama']}}&dosen_nama_lengkap={{ $dosen['nama_lengkap'] }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item['mata_kuliah_nama'] }}</td><td>{{ $dosen['nama_lengkap'] }}</td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection