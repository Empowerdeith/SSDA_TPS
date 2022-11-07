@extends('index.index_sidebar')
@section('content_home')
<h1 class="text-center blue_tps">Gestionar emails de Destinatarios:</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-2-strong">
                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-block d-table my-5 mx-auto" data-bs-toggle="modal" data-bs-target="#ModalForm">
                        <i class="fa-solid me-2 fa-plus"></i>Agregar nuevo Destinatario</button>
                    <!-- Modal Form -->
                    <div class="modal fade" id="ModalForm" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="">
                                    <div class="modal-header blue_tps_bg">
                                    <h5 class="modal-title text-white"><i class="fa-solid me-2 fa-plus"></i>Agregar un nuevo Destinatario:</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name">Nombre Completo:<span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" id="Username" placeholder="Ingrese Nombre Completo">
                                    </div>

                                    <div class="mb-3">
                                        <label for="cargo">Cargo:<span class="text-danger">*</span></label>
                                        <input type="text" name="cargo" class="form-control" id="Cargo" placeholder="Ingrese Cargo">
                                    </div>

                                    <div class="mb-3">
                                        <label for="email">Email:<span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="correo@ejemplo.com">
                                    </div>

                                    </div>
                                    <div class="modal-footer pt-4">
                                    <button type="button" class="btn btn-primary mx-auto w-100">Agregar Destinatario</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                                    <th scope="col">Nombre Completo</th>
                                    <th scope="col">Cargo</th>
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
                                    <td>Juan Testing</td>
                                    <td>Equipo Tps</td>
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
