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
                        $slider_value = 1;
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
            </div>
        </form>
        @if (isset($resultados)&& count($resultados)>0)
            <div class="pt-5 d-flex align-items-center justify-content-center">
                <form class="form-inline" id="auto_form" action="/send-auto-email" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="text-center">
                        <label class="form-label" for="mail_data">Ingrese el correo de el/los Destinatarios:</label>
                        <input id="mail_form" class="form-control" type="email" placeholder="correo@ejemplo.com" name="mail_form" required>
                    </div>
                    <div class="pt-5">
                        <input type="submit" class="btn btn-primary text-white show_confirm form-control send_save_employees" value="Guardar y Enviar Sorteo">
                    </div>
                </form>
            </div>
            <section class="d-lg-flex align-items-center justify-content-center mb-5">
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
                                        <td>{{$row[0]}}</td>
                                        <td>{{$row[1]}}</td>
                                        <td>{{$row[2]}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </section>
        @endif
    </div>
</div>
@endsection
