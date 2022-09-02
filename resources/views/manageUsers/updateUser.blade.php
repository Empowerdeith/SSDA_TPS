@extends('index.index_sidebar')
@section('content_home')
    <section class="vh-75" style="background-color: #eee;">
        <div class="container h-100">
            @include('manageUsers.validation')

            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 32px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 blue_tps">Actualizar Datos</p>

                                    <form class="mx-1 mx-md-4" action="{{route('updateUser2', $user->id)}}" method="POST">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{$user->name}}">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" class="form-control" name="rut" placeholder="Rut" value="{{$user->rut}}">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-solid fa-circle-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" class="form-control" name="username" placeholder="Nombre de usuario" value="{{$user->username}}"/>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{$user->email}}"/>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-solid fa-user-tie fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" class="form-control" name="cargo" placeholder="Cargo"value="{{$user->cargo}}"/>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" class="form-control" name="password" placeholder="Contraseña"/>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-solid fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" class="form-control" name="password_confirmation" placeholder="Repite la contraseña"/>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                                        </div>

                                    </form>
                                    <form class="mx-1 mx-md-4" action="{{route('deleteUser', $user->id)}}" method="POST">
                                        @csrf
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" name=userID placeholder="Ingrese ID para confirmar">
                                            <button type="submit" class="btn btn-primary btn-lg">Borrar Usuario</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <img src="{{ asset('img/testing.jpg')}}"class="img-fluid" alt="Sample image" style="border-radius: 25px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
