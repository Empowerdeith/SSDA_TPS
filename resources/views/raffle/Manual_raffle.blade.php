@extends('index.index_sidebar')
@section('content_home')
<div class="card text-black pt-5 pb-5" style="border-radius: 32px;">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-center blue_tps">Sorteo Manual</h2>
                <p class="text-center">
                Este es el Sorteo Manual de test de drogas y alcohol, para utilizar este módulo debes subir un archivo en formato excel y luego escribir él o los correos de destino.
                </p>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            <form class="range" action="/raffle_manual" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8  col-sm-8 form-group range__slider">
                        @php
                            $slider_value = 1;
                            if (isset($porcentaje_manual)) {
                                $slider_value = $porcentaje_manual;
                            }
                            echo '<input type="range" min="1" max="100" value="' . $slider_value . '" step="1" name="porcentaje_manual">';
                        @endphp
                    </div>
                    <div class="col-lg-4 col-sm-4 form-group range__value">
                        <label>Porcentaje de sorteo</label>
                        <span></span>
                    </div>
                    <div class="col">
                        <p>Sube tu archivo excel aquí: </p>
                        <div class="file-upload-wrapper">
                            <input type="file" id="input-file-now" class="file-upload" name="texto_sorteados" accept=".xls,.xlsx"/>
                        </div>
                        <div class="pb-5">
                            <div class="alert-danger red_color">{{$errors -> first('texto_sorteados')}}</div>
                            <div class="alert-danger red_color">{{$errors -> first('mail_form')}}</div>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary text-white btn-lg button-style" value="Realizar Sorteo">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @if (isset($resultados) && count($resultados)>0)
            <div class="pt-5 pb-5 d-flex align-items-center justify-content-center">
                <form class="form-inline" id="second_form" action="/send-email" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="text-center">
                        <label class="form-label" for="mail_data">Ingrese el correo de el/los Destinatarios:</label>
                        <input id="mail_data" class="form-control" type="email" placeholder="correo@ejemplo.com" name="mail_form" required>
                    </div>
                    <div class="pt-5">
                        <input type="submit" class="btn btn-primary text-white show_confirm form-control send_save_employees" value="Guardar y Enviar Sorteo">
                    </div>
                </form>
            </div>
            <section class="d-lg-flex align-items-center justify-content-center mb-5">
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
            </section>
        @endif
    </div>
</div>
@endsection
