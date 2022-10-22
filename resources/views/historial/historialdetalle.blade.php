@extends('index.index_sidebar')
@section('content_home')
<div class="col-lg-12 col-xl-12 pt-3 pb-3">
<div class="card text-black pt-3" style="border-radius: 32px;">
    @if (isset($id_sent))
        <h1 class="text-center blue_tps">Detalle de Sorteo N°{{$id_sent}}</h1>
    @endif
    <div class="pt-3">
        <div class="container">
            <form class="row mx-1 mx-md-4" method="GET">
                @csrf
                <div class="table-responsive">
                    <table table class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>Cargo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($query as $value)
                            <tr>
                                <td>{{$value -> id}}</td>
                                <td>{{$value -> rut}}</td>
                                <td>{{$value -> name}}</td>
                                <td>{{$value -> cargo}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
