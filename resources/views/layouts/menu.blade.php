<ul class="nav nav-main">
    <li class="{{ stripos($current_route_path,'home')!==false ? 'nav-active' : '' }}">
        <a href="{{url('home')}}">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span>Home</span>
        </a>
    </li>

    {{-- @role((['super_admin'])) --}}
    <li class="nav-parent {{ stripos($current_route_path,'roles')!==false || stripos($current_route_path,'user_role')!==false ? 'nav-active nav-expanded' : '' }}">
        <a>
            <i class="fa fa-copy" aria-hidden="true"></i>
            <span>Admin</span>
        </a>
        <ul class="nav nav-children">

            <li class="{{ stripos($current_route_path,'roles')!==false ? 'nav-active' : '' }}">
                <a href="{{url('/roles')}}">
                    Role
                </a>
            </li>
            <li class="{{ stripos($current_route_path,'user_role')!==false ? 'nav-active' : '' }}">
                <a href="{{url('/user_role')}}">
                    User-Role
                </a>
            </li>
        </ul>
    </li>
    {{-- @endrole --}}

    <li class="nav-parent {{ stripos($current_route_path,'master')!==false ? 'nav-active nav-expanded' : '' }}">
        <a>
            <i class="fa fa-copy" aria-hidden="true"></i>
            <span>Master Data</span>
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
            <li class="{{ stripos($current_route_path,'pompa_air_baku')!==false ? 'nav-active' : '' }}">
                <a href="{{url('/master/pompa_air_baku')}}">
                    Pompa Air Baku
                </a>
            </li>
            <li class="{{ stripos($current_route_path,'pompa_distribusi')!==false ? 'nav-active' : '' }}">
                <a href="{{url('/master/pompa_distribusi')}}">
                    Pompa Distribusi
                </a>
            </li>
            <li class="{{ stripos($current_route_path,'reservoir')!==false ? 'nav-active' : '' }}">
                <a href="{{url('/master/reservoir')}}">
                    Reservoir
                </a>
            </li>
            <li class="{{ stripos($current_route_path,'filter')!==false ? 'nav-active' : '' }}">
                <a href="{{url('/master/filter')}}">
                    Filter
                </a>
            </li>

        </ul>
    </li>

    <li class="nav {{ stripos($current_route_path,'users_has_unit')!==false ? 'nav-active' : '' }}">
        <a href="{{url('/users_has_unit')}}">
            <i class="fa fa-copy" aria-hidden="true"></i>
            <span>Pengaturan User-Unit</span>
        </a>
    </li>

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
    <li class="nav-parent {{ stripos($current_route_path,'daftar')!==false ? 'nav-active nav-expanded' : '' }}">
        <a>
            <i class="fa fa-copy" aria-hidden="true"></i>
            <span>Daftar</span>
        </a>
        <ul class="nav nav-children">
            {{--@role((['admin_direktorat']))--}}

            <li class="{{ stripos($current_route_path,'user')!==false ? 'nav-active' : '' }}">
                <a href="{{url('/daftar/user')}}">
                    User
                </a>
            </li>
        </ul>
    </li>

    {{--<li class="nav-parent {{ stripos($current_route_path,'laporan')!==false ? 'nav-active nav-expanded' : '' }}">
        <a>
            <i class="fa fa-copy" aria-hidden="true"></i>
            <span>Laporan</span>
        </a>
        <ul class="nav nav-children">
            --}}{{--@role((['admin_direktorat']))--}}{{--
            <li class="{{ stripos($current_route_path,'laporan_siswa')!==false ? 'nav-active' : '' }}">
                <a href="{{url('/laporan/laporan_siswa')}}">
                    Siswa
                </a>
            </li>
            <li class="{{ stripos($current_route_path,'laporan_transaksi')!==false ? 'nav-active' : '' }}">
                <a href="{{url('/laporan/laporan_transaksi')}}">
                    Transaksi
                </a>
            </li>
        </ul>
    </li>--}}
    {{--@endrole--}}
</ul>