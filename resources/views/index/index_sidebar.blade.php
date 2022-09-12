@extends('index.index_master')
@section('content')
    @auth
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100 text-white">
                        <span class="fs-5 d-none d-sm-inline font_24 pt-5 pb-3">Bienvenido, {{auth()->user()->name ?? auth()->user()->username}}</span>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        @can('admin.manage')
                        <li class="nav-item pt-4">
                                <i class="fa-solid fa-screwdriver-wrench big_icons"></i><span class="ms-1 d-none d-sm-inline font_20">Administración</span>
                        </li>
                        <li>
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fa-solid fa-user-gear big_icons"></i><span class="ms-1 d-none d-sm-inline font_20">Gestionar usuarios</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="/register" class="nav-link px-0"><i class="fa-solid fa-user-plus big_icons"></i><span class="d-none d-sm-inline font_18"> Crear Usuarios</span></a>
                                </li>
                                <li>
                                    <a href="/showUsers" class="nav-link px-0"><i class="fa-solid fa-user-pen big_icons"></i><span class="d-none d-sm-inline font_18"> Ver Usuarios</span></a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('operator.manage')
                        <li class="nav-item pt-4">
                            <i class="fa-solid fa-user-tie big_icons"></i><span class="ms-1 d-none d-sm-inline font_20">Funcionarios</span>
                        </li>
                        <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                <i class="fa-sharp fa-solid fa-ticket big_icons"></i><span class="ms-1 d-none d-sm-inline font_20">Gestionar Sorteos</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="/raffle_auto" class="nav-link px-0"><i class="fa-solid fa-clipboard-check big_icons"></i><span class="d-none d-sm-inline font_18"> Sorteo automatizado</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"><i class="fa-solid fa-clipboard-list big_icons"></i><span class="d-none d-sm-inline font_18"> Sorteo Manual</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0">
                                        <i class="fa-solid fa-calendar-days big_icons"></i><span class="d-none d-sm-inline font_18"> Historial de sorteos</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fa-sharp fa-solid fa-circle-plus big_icons"></i><span class="ms-1 d-none d-sm-inline font_20"> Extras</span> </a>
                        </li>
                        @endcan
                    </ul>
                    <hr>
                </div>
            </div>
            <div class="col py-3" style="background-color: #eee">
                @yield('content_home')
            </div>
        </div>
    </div>
    @endauth
    @guest
        <div>
            @include('guest.alert_guest')
        </div>
    @endguest
@endsection
