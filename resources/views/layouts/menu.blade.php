<ul class="nav nav-main">
    <li class="{{ stripos($current_route_path,'home')!==false ? 'nav-active' : '' }}">
        <a href="{{url('home')}}">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span>Home</span>
        </a>
    </li>

    @if(Auth::user()->admin_evaluasi_dosen)
    <li class="nav-parent {{ stripos($current_route_path,'admin')!==false ? 'nav-active nav-expanded' : '' }}">
        <a>
            <i class="fa fa-copy" aria-hidden="true"></i>
            <span>Admin</span>
        </a>
        <ul class="nav nav-children">
            <li class="{{ stripos($current_route_path,'jenis_pertanyaan')!==false ? 'nav-active' : '' }}">
                <a href="{{url('/admin/jenis_pertanyaan')}}">
                    Jenis Pertanyaan
                </a>
            </li>
            <li class="{{ stripos($current_route_path,'pertanyaan')!==false ? 'nav-active' : '' }}">
                <a href="{{url('/admin/pertanyaan')}}">
                    Pertanyaan
                </a>
            </li>
        </ul>
    </li>
    @endif

{{--    <li class="nav {{ stripos($current_route_path,'users_has_unit')!==false ? 'nav-active' : '' }}">
        <a href="{{url('/users_has_unit')}}">
            <i class="fa fa-copy" aria-hidden="true"></i>
            <span>Pengaturan User-Unit</span>
        </a>
    </li>--}}

    {{--<li class="nav-parent {{ stripos($current_route_path,'master')!==false ? 'nav-active nav-expanded' : '' }}">
        <a>
            <i class="fa fa-copy" aria-hidden="true"></i>
            <span>Master Data IPAL</span>
        </a>
        <ul class="nav nav-children">
            <li class="{{ stripos($current_route_path,'unit')!==false ? 'nav-active' : '' }}">
                <a href="{{url('/master/unit')}}">
                    Unit
                </a>
            </li>
            <li class="{{ stripos($current_route_path,'instalasi_pengolahan_air')!==false ? 'nav-active' : '' }}">
                <a href="{{url('/master/instalasi_pengolahan_air')}}">
                    Instalasi Pengolahan Air
                </a>
            </li>
        </ul>
    </li>--}}

    {{--@role((['admin']))--}}
   {{-- <li class="nav-parent {{ stripos($current_route_path,'daftar')!==false ? 'nav-active nav-expanded' : '' }}">
        <a>
            <i class="fa fa-copy" aria-hidden="true"></i>
            <span>Daftar</span>
        </a>
        <ul class="nav nav-children">
            --}}{{--@role((['admin_direktorat']))--}}{{--

            <li class="{{ stripos($current_route_path,'user')!==false ? 'nav-active' : '' }}">
                <a href="{{url('/daftar/user')}}">
                    User
                </a>
            </li>
        </ul>
    </li>--}}

    @if(Auth::user()->staff ||Auth::user()->dosen)
    <li class="nav-parent {{ stripos($current_route_path,'laporan')!==false ? 'nav-active nav-expanded' : '' }}">
        <a>
            <i class="fa fa-copy" aria-hidden="true"></i>
            <span>Laporan</span>
        </a>
        <ul class="nav nav-children">
            @if(Auth::user()->staff)
            <li class="{{ stripos($current_route_path,'laporan')!==false ? 'nav-active' : '' }}">
                <a href="{{url('/admin/laporan')}}">
                    Laporan
                </a>
            </li>
            @endif
                @if(Auth::user()->dosen)
                    <li class="{{ stripos($current_route_path,'laporan_dosen')!==false ? 'nav-active' : '' }}">
                        <a href="{{url('/admin/laporan_dosen')}}">
                            Laporan Dosen
                        </a>
                    </li>
            @endif
</ul>
</li>
@endif
{{--@endrole--}}
</ul>