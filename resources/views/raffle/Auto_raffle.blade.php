@extends('index.index_sidebar')
@section('content_home')
<div class="card text-black pt-5 pb-5 h-100" style="border-radius: 32px;">
    <h1 class="text-center blue_tps">Sorteo automatizado</h1>
    <p class="text-center">
        Introduce línea por línea el nombre de los participantes. A continuación, selecciona el número de ganadores que quieres tener:
    </p>
    <div class="h-100 pt-3 d-flex align-items-center justify-content-center">
        <form class="range" action="/raffle_auto" method="post">
            @csrf
            <div class="row align-items-center">
                <div class="form-group range__slider col-4">
                    @php
                        $slider_value = 5;
                        if (isset($porcentaje)) {
                            $slider_value = $porcentaje;
                        }
                        echo '<input type="range" min="1" max="100" value="' . $slider_value . '" step="1" name="percentage">';
                    @endphp
                </div>
                <div class="form-group range__value col-6 mb-5">
                    <label>Porcentaje de sorteo</label>
                    <span></span>
                </div>
                <input type="submit" class="btn btn-primary text-white mb-5" value="Realizar Sorteo">
                @if (isset($resultados)&&$resultados!=null)
                    <a href="{{ route('raffle.save') }}"><input type="button" class="btn btn-primary text-white" value="Guardar y Enviar Sorteo"></a>
                @endif
                <section class=" pt-5 mb-5">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="mostrar_resultados">
                            <thead class="">
                                <tr>
                                <th scope="col"></th>
                                <th scope="col">Rut</th>
                                <th scope="col">Nombre Completo</th>
                                <th scope="col">Cargo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($resultados)&&$resultados!=null)
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
                </section>
            </div>
        </form>
    </div>
</div>
@endsection
