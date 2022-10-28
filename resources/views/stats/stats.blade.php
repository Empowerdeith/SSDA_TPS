@extends('index.index_sidebar')
@section('content_home')

<h1 class="text-center blue_tps">Estadísticas </h1>

@if (isset($notes))
<div class="container table-responsive">
    <table id="stats_table" class="table table-bordered">
        <thead>
            <tr>
               <th></th>
               <th>Rut</th>
               <th>Nombre</th>
               <th>Cargo</th>
               <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @php
                $contador = 1;
            @endphp
            @foreach ( $notes as $row )
                <tr>
                    <td>{{$contador}}</td>
                    @php
                        $contador+=1;
                    @endphp
                    <td>{{$row["RUT"]}}</td>
                    <td>{{$row["NAME"]}}</td>
                    <td>{{$row["CARGO"]}}</td>
                    <td>{{$row["VALOR"]}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endif

@if (isset($notes2))
<div class="table-responsive">
    <table id="stats_table" class="table table-bordered" style="max-height:600px">
        <thead>
            <tr>
               <th></th>
               <th>Nombre</th>
               <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @php
                $contador = 1;
            @endphp
            @foreach ( $notes2 as $row )
                <tr>
                    <td>{{$contador}}</td>
                    @php
                        $contador+=1;
                    @endphp
                    <td>{{$row->nombre}}</td>
                    <td>{{$row->cantidad}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif


@endsection
