@extends('index.index_sidebar')
@section('content_home')
<script src='https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js'></script>
<h1 class="text-center blue_tps pb-4"><i class="fa-solid fa-chart-pie me-2 big_icons"></i>Estadísticas</h1>
@if (isset($notes))
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
</div>

@endif

<br><br><br><br><br>

<div class = 'row col-5' style="width:1000px; margin:0 auto;">
    <canvas id="myChart"></canvas>
</div>

<script>
    const name = [<?php echo '["' . implode('", "', $name) . '"]' ?>];
    var counter = @json($counter);
    const data = {
        labels: name[0],
        datasets: [{
          label: 'Personas mas sorteadas',
          data: counter,
          backgroundColor: [
            'rgba(255, 26, 104, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(0, 0, 0, 0.2)'
          ],
          borderColor: [
            'rgba(255, 26, 104, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(0, 0, 0, 1)'
          ],
          borderWidth: 1
        }]
      };

      // config
      const config = {
        type: 'bar',
        data,
        options: {
          indexAxis: 'y',
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      };

      // render init block
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
</script>


@endsection
