@extends('index.index_sidebar')
@section('content_home')
<div class="card text-black pt-5 pb-5" style="border-radius: 32px;">
    <h2 class="text-center">Sorteo Manual</h2>
    <p class="text-center">
    Introduce línea por línea el nombre de los participantes. A continuación, selecciona el número de ganadores que quieres tener:
    </p>
    <div class="h-100 pt-3 d-flex align-items-center justify-content-center">
        <form class="range" action="/raffle_manual" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row align-items-center">
                <div class="form-group range__slider col-4">
                    @php
                        $slider_value = 1;
                        if (isset($porcentaje_manual)) {
                            $slider_value = $porcentaje_manual;
                        }
                        echo '<input type="range" min="1" max="100" value="' . $slider_value . '" step="1" name="porcentaje_manual">';
                    @endphp
                </div>
                <div class="form-group range__value col-6">
                    <label>Porcentaje de sorteo</label>
                    <span></span>
                </div>
                <div class="mb-5">
                    <p>Participantes: </p>
                    <div class="file-upload-wrapper mb-5">
                        <input type="file" id="input-file-now" class="file-upload" name="texto_sorteados" accept=".xls,.xlsx"/>
                    </div>
                    <div class="alert-danger">{{$errors -> first('texto_sorteados')}}</div>
                    <div class="alert-danger">{{$errors -> first('mail_form')}}</div>
                    <input type="submit" class="btn btn-primary text-white" value="Realizar Sorteo">
                </div>
            </div>
        </form>
    </div>
    @if (isset($resultados)&&$resultados!=null)
        <div class="pt-5 pb-5">
            <form class="form-inline" id="second_form" action="/send-email" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group text-center w-50 mb-5">
                    <input class="form-control" type="email" placeholder="ingrese email" name="mail_form">
                </div>
                <div class="w-50">
                    <input type="submit" class="btn btn-primary text-white show_confirm form-control send_save_employees" value="Guardar y Enviar Sorteo">
                </div>
            </form>
        </div>
    @endif
    <section class="mb-5">
        @if (isset($resultados) && count($resultados)>0)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Rut</th>
                            <th scope="col">Nombre Completo</th>
                            <th scope="col">Cargo</th>
                        </tr>
                    </thead>
                    <tbody>
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
                    </tbody>
                </table>
            </div>
        @endif
    </section>
</div>
@endsection
