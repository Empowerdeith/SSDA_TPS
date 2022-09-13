@extends('index.index_sidebar')
@section('content_home')
<div class="col-lg-12 col-xl-12 pt-3 pb-3">
<div class="card text-black pt-3" style="border-radius: 32px;">
    <h1 class="text-center blue_tps">Detalle Sorteo</h1>
    <div class="pt-3">
        <div class="container">
            <form class="mx-1 mx-md-4" method="GET">
                @csrf
                <table table class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Sorteo</th>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Cargo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($query as $value)
                        <tr>                                                        
                            <td>{{$value -> raffle_id}}</td>
                            <td>{{$value -> rut}}</td>
                            <td>{{$value -> name}}</td>
                            <td>{{$value -> cargo}}</td>                                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('export', $value->raffle_id)}}" class="btn btn-primary">Exportar Detalle</a>
                <br><br>
            </form>
        </div>
    </section>
@endsection