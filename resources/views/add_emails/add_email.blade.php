@extends('index.index_sidebar')
@section('content_home')
<h1 class="text-center blue_tps">Gestionar emails de Destinatarios:</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-2-strong">
                <div class="card-body">
                    <div>
                        <a href="#" class="btn btn-primary btn-block text-uppercase mb-3"><i class="fa-solid me-2 fa-plus"></i>Agregar Email</a></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table mx-auto mb-0">
                            <thead class="blue_tps_bg text-white text-center">
                                <tr>
                                    <th scope="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                        </div>
                                    </th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1"/>
                                        </div>
                                    </th>
                                    <td>example@gmail.com</td>
                                    <td>
                                        <button type="submit" class="btn btn-primary btn-sm delete_users" ><i class="fa-solid fa-x"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
