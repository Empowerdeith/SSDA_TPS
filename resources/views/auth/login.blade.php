<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('snippets.links')
</head>
<body id="login">
    @include('snippets.header')
    <!--Formulario de Login para la página.-->
    <div id="login_parameters" style="background-image: url('{{ asset('img/background_pic.jpg')}}');">
        <br>
        <div class="container w-75 mt-5 rounded shadow">
            <div class="row align-items-stretch">
                <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
                </div>
                <div class="col bg-white p-5 rounded-end">

                    <div class="text-center">
                        <img src="../Img/tps_web2021.png" alt="">
                    </div>
                    <h2 class="fw-bold text-center py-5 blue_tps">Iniciar sesión</h2>
                    <!--Login-->
                    <form action="/login" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="form-label blue_tps">Nombre de usuario:</label>
                            <input type="text" class="form-control"name="username" id="">
                        </div>
                        <div class="mb-4"></div>
                            <label for="password" class="form-label blue_tps">Contraseña:</label>
                            <input type="password" class="form-control"name="password" id="">
                        <br>
                        <div class="mb-4 form-check">
                            <input type="checkbox" name="connected" class="form-check-input blue_tps">
                            <label for="connected" class="form-check-label blue_tps">Mantener sesión iniciada.</label>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary blue_tps_bg">Acceder</button>
                        </div>
                        <div class="my-3 text-center">
                            <span><i class="fa-solid fa-lock" style="color:#144578"></i><a href="https://portalweb.tps.cl/tps_online/transaccional/login/recuperar_contrasena" class="blue_tps"> ¿Olvidaste tu contraseña?</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br><br>
    </div>
    @include('snippets.footer')
</body>
</html>
