<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TPS - Sistema Sorteo Drogas y Alcohol</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/Styles.css') }}"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
</head>
<body id="inicio">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <img class="logo"src="https://portalweb.tps.cl/tps_online/assets/images/tpshome/logo-tps-header.svg" alt="" style="float: right; width: 100px; height: 40px; margin-top: 10px;">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="" role="button" ><i class="fa fa-bars" aria-hidden="true" style="color:#e6e6ff"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <br><br>
                    <ul class="navbar-nav ms-auto mb-2 mb-md-0 justify-content-center text-uppercase">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="https://www.tps.cl/">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Preguntas Frecuentes</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cuenta</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#"></a></li>
                                <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
                                <!--<li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>-->
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
          </nav>
    </header>
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
                    <h2 class="fw-bold text-center py-5 blue_tps">Testing</h2>
                    <!--Login-->
                    <form action="#">
                    </form>
                </div>
            </div>
        </div>
        <br><br>
    </div>
    <footer class="text-white pt-5 pb-4">
        <div class="container text-center text-md-left">
            <div class="row text-center text-md-left">
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold">Terminal Pacífico Sur Valparaíso - Chile.</h5>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold">Ubicación:</h5>
                    <p>Antonio Varas Nº 2. Piso 3.</p>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold">Teléfono:</h5>
                    <p>+56-32-2275800.</p>
                </div>
                <div class="col-md-4 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold">Fax:</h5>
                    <p>56-32-2275813.</p>
                </div>
                <div class="col-md-5 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold">Síguenos en:</h5>
                    <a href="https://twitter.com/TPS_Valparaiso"><img src="{{asset('img/twitter.svg')}}" width="30" height="30"></a>
                    <a href="https://www.facebook.com/TPSValparaiso/"><img src="{{asset('img/facebook.svg')}}" width="30" height="30"></a>
                    <a href="https://www.linkedin.com/company/1394617?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A1394617%2Cidx%3A1-1-1%2CtarId%3A1444153826149%2Ctas%3Aterminal%20pacifico%20"><img src="{{asset('img/linkedin.svg')}}" width="30" height="30"></a>
                    <a href="https://www.instagram.com/tps_valparaiso/"><img src="{{asset('img/instagram.svg')}}" width="30" height="30"></a>
                    <a href="https://www.youtube.com/channel/UCiaVT5duAI687mxOqghHCBw/featured"><img src="{{asset('img/youtube.svg')}}" width="30" height="30"></a>
                </div>
            </div>
        </div>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </footer>
</body>
</html>