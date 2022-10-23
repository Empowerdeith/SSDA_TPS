@extends('index.index_master')
@section('content')
    @auth
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto px-0 py-0 border-0">
                <div id="sidebar" class="collapse collapse-horizontal show vh-100">
                    <div id="sidebar-nav" class="list-group border-0 rounded-none">
                        <div class="p-2 pb-4">
                            <a href="/home" class="text-decoration-none"><h4 class="text-white"><i class="fa-sharp fa-solid fa-house"></i> Operaciones Disponibles </h4></a>
                        </div>
                        <ul class="list-group">
                            @can('admin.manage')
                                <div class="p-2">
                                    <h4 class="text-white"><i class="fa-solid fa-screwdriver-wrench big_icons"></i><span class="font_20"> Administración</span></h4>
                                </div>
                                <li class="list-group-item">
                                    <a href="/register" class="text-decoration-none blue_tps"><i class="fa-solid fa-user-plus big_icons blue_tps"></i><span class="font_18"> Crear Usuarios</span></a> </li>
                                <li class="list-group-item">
                                    <a href="/showUsers" class="text-decoration-none blue_tps"><i class="fa-solid fa-user-pen big_icons blue_tps"></i><span class="font_18"> Ver y Editar Usuarios</span></a> </li>
                                <li class="list-group-item">
                                    <a href="#" class="text-decoration-none blue_tps"><i class="fa-solid fa-chart-pie big_icons blue_tps"></i><span class="font_18"> Estadísticas</span></a> </li>
                            @endcan
                            @can('operator.manage')
                                <div class="p-2">
                                    <h4 class="text-white"><i class="fa-sharp fa-solid fa-ticket big_icons"></i><span class="font_20"> Gestionar Sorteos</span></h4>
                                </div>
                                <li class="list-group-item">
                                    <a href="/raffle_auto" class="text-decoration-none blue_tps"><i class="fa-solid fa-clipboard-check big_icons blue_tps"></i><span class="font_18"> Sorteo Automatizado</span></a></li>
                                <li class="list-group-item">
                                    <a href="/raffle_manual" class="text-decoration-none blue_tps"><i class="fa-solid fa-clipboard-list big_icons blue_tps"></i><span class="font_18"> Sorteo Manual</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="/historial" class="text-decoration-none blue_tps"><i class="fa-solid fa-calendar-days big_icons blue_tps"></i><span class="font_18"> Historial de Sorteos</span></a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col ps-md-2 pt-2" style="background-color: #eee">
                <a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse" class="border rounded-3 p-1 text-decoration-none" style="font-size: 45px;  color:#144578;"><i class="bi bi-list"></i></a>
                <div class="pt-4 pb-5">
                    @yield('content_home')
                </div>
            </div>
        </div>
    </div>
    @endauth
@endsection
