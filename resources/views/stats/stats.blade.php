@extends('index.index_sidebar')
@section('content_home')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
<h1 class="text-center blue_tps pb-4"><i class="fa-solid fa-chart-pie me-2 big_icons"></i>Estadísticas</h1>
@if (isset($notes)&&isset($result_cur_users))
    <div class="container">
        <h2 class="blue_tps font_25">Cantidad de veces que el funcionario ha sido sorteado:</h2>
        <div class="table-responsive">
            <table id="stats_table" class="table table-bordered">
                <thead class="text-center blue_tps_bg text-white">
                    <tr>
                    <th>N°</th>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Cargo</th>
                    <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody class="text-center">
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
        <div class ="row pt-5">
            <!--<div class="col-6">
                <h2 class="blue_tps font_25">Gráfico que muestra algo:</h2>
                <canvas id="myChart"></canvas>
            </div>-->
            <div class="col">
                <h2 class="blue_tps font_25">Cantidad de sorteos realizados:</h2>
                <div class="table-responsive">
                    <table id="stats_table" class="table table-bordered">
                        <thead class="text-center blue_tps_bg text-white">
                            <tr>
                            <th>Nombre</th>
                            <th>Nombre usuario</th>
                            <th>Cargo</th>
                            <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($result_cur_users as $element)
                                <tr>
                                    <td>{{$element["NAME"]}}</td>
                                    <td>{{$element["USERNAME"]}}</td>
                                    <td>{{$element["CARGO"]}}</td>
                                    <td>{{$element["CANTIDAD"]}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--<script>
            var canvasElement =$("#myChart");
            var config = {
                type: "bar",
                data: {
                    labels: ["uno","dos"],
                    datasets: [{label: "number of items", data:[5,2]}],
                },
            };
            var amazingChart = new Chart(canvasElement, config);
        </script>-->
    </div>
@endif
@endsection
