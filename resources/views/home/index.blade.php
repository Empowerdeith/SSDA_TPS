@extends('index.index_sidebar')
@section('content_home')
<div class="page-header pt-3">
    <div class="row">
        <div class="col-md-8">
            <h2 class="blue_tps">Bienvenido, {{auth()->user()->name ?? auth()->user()->username}}</h2>
        </div>
        <div class="col-md-4">
            @php
                $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                $date=$diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
            @endphp
            <h3 class="blue_tps">{{$date}}</h3>
        </div>
    </div>
</div>
<hr class="blue_tps">
<div class="row">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body text-start">
                <h5 class="card-title">En construcción</h5>
                <p class="card-text"><i class="bi bi-people mr-3"></i>600</p>
                <a href="#" class="btn btn-primary">ver tabla</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body text-start">
                <h5 class="card-title">En construcción</h5>
                <p class="card-text"><i class="bi bi-people mr-3"></i>70</p>
                <a href="#" class="btn btn-primary">ver tabla</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body text-start">
                <h5 class="card-title">En construcción</h5>
                <p class="card-text"><i class="bi bi-people mr-3"></i>100+</p>
                <a href="#" class="btn btn-primary">ver tabla</a>
            </div>
        </div>
    </div>
</div>
@endsection
