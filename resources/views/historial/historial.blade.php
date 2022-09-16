@extends('index.index_sidebar')
@section('content_home')
<div class="col-lg-12 col-xl-12 pt-3 pb-3">
<div class="card text-black pt-3" style="border-radius: 32px;">
    <h1 class="text-center blue_tps">Historial de Sorteo</h1>
    <div class="pt-3">
        <div class="container">
            <form action="{{route('historial')}}" method ="GET">
                @csrf
                <br>
                <div class="container">
                    <div class="row">
                        <div class="container-fluid">
                            <div class="form-group row">
                                <label for="date" class="col-form-label col-sm-2">Desde</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control input-sm" id="fromDate" name="fromDate" required/>
                                </div>
                                <label for="date" class="col-form-label col-sm-2">Hasta</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control input-sm" id="toDate" name="toDate" required/>
                                </div>
                                <br>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary" name="search" title="Search">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </form>
            <table id="datosTrabajador" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($query as $value)
                    <tr>
                        <td class="id">{{$value->id}}</td>
                        <td class="created_at">{{$value->created_at}}</td>
                        <td><a href="{{route('historialdetalle', $value->id)}}">"Ver detalle"</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection
