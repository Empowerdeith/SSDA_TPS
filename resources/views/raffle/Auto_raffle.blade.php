@extends('index.index_sidebar')
@section('content_home')
<div class="col-lg-12 col-xl-12 pt-3 pb-3">
<div class="card text-black pt-3" style="border-radius: 32px;">
    <h1 class="text-center blue_tps">Sorteo automatizado</h1>
    <div class="pt-3">
        <div class="container">
            <form class="range" action="/raffle_auto" method="post">
                @csrf
                <div class="form-group range__slider">
                    @php
                        $slider_value = 5;
                        if (isset($porcentaje)) {
                            $slider_value = $porcentaje;
                        }
                        echo '<input type="range" min="5" max="100" value="' . $slider_value . '" step="5" name="percentage">';
                    @endphp
                </div>
                <div class="form-group range__value">
                    <label>Porcentaje de sorteo</label>
                    <span></span>
                </div>
                <input type="submit" class="btn btn-primary text-white" value="Realizar Sorteo">
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <div class="card-body p-md-5">
            <table class="table table-bordered" id="mostrar_resultados">
                <thead class="bg-light sticky-top top-0">
                    <tr>
                    <th scope="col"></th>
                    <th scope="col">Rut</th>
                    <th scope="col">Nombre Completo</th>
                    <th scope="col">Cargo</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($resultados))
                        @php
                            $number=1;
                        @endphp
                        @foreach ($resultados as $row)
                            <tr>
                            <td>{{$number}}</td>
                            @php
                                $number+=1;
                            @endphp
                            @foreach ($row as $element)
                                    <td>{{ $element }}</td>
                            @endforeach
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <input type="button" class="btn btn-primary text-white btn-sm" value="Enviar por Correo">

</div>
<script src="{{ asset('js/functions.js') }}" ></script>
</div>
@endsection
