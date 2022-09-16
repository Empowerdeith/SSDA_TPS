@extends('index.index_sidebar')
@section('content_home')
<div class="col-lg-12 col-xl-12 pt-3 pb-3">
    <div class="card text-black pt-3" style="border-radius: 32px;">
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
                                $slider_value = 5;
                                if (isset($porcentaje_manual)) {
                                    $slider_value = $porcentaje_manual;
                                }
                                echo '<input type="range" min="5" max="100" value="' . $slider_value . '" step="5" name="porcentaje_manual">';
                            @endphp
                        </div>
                        <div class="form-group range__value col-6">
                            <label>Porcentaje de sorteo</label>
                            <span></span>
                        </div>
                        <div class="">
                            <p>Participantes: </p>
                            <div class="file-upload-wrapper mb-5">
                                <input type="file" id="input-file-now" class="file-upload" name="texto_sorteados"/>
                            </div>
                            <textarea id="mi_texto" class="form-control mb-4" name="participantes"></textarea>
                            <input type="submit" class="btn btn-primary text-white mb-5" value="Realizar Sorteo">
                        </div>
                        <section class="mb-5">
                            @if (isset($resultados) && count($resultados)>0)
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Trabajadores Sorteados</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($resultados as $element)
                                                <tr>
                                                    <td>
                                                        {{$element}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </section>
                    </div>
                </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/functions.js') }}" ></script>
@endsection
