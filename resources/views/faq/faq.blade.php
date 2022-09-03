<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('snippets.links')

</head>

<body id="show_body">
    @include('snippets.header')
    <section class="vh-75" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 32px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <section>
                                    <h3 class="text-center mb-4 pb-2 text-primary fw-bold">Preguntas Frecuentes</h3>
                                    <p class="text-center mb-5">
                                    Encuentra respuesta a las preguntas más frecuentes para el uso de la plataforma
                                    </p>
                                
                                    <div class="row">
                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <h6 class="mb-3 text-primary"><i class="far fa-paper-plane text-primary pe-2"></i> Que es el sistema de sorteo de test de drogas y alcohol (SSDA)?</h6>
                                        <p>
                                        Este sistema te permite realizar los sorteos de test de drogas y alcohol en los trabajadores de TPS, exceptuando
                                        aquellos con permiso, licencia o vacaciones.
                                        </p>
                                    </div>
                                
                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <h6 class="mb-3 text-primary"><i class="fas fa-pen-alt text-primary pe-2"></i> Cómo puedo acceder al sistema?</h6>
                                        <p>
                                        Debes solicitar tu registro al administrador, quien te conferirá acceso al sistema. Puedes contactarle:
                                        <a href="mailto:administadortps@tps.cl">administadortps@tps.cl</a>
                                        </p>
                                    </div>
                                
                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <h6 class="mb-3 text-primary"><i class="fas fa-user text-primary pe-2"></i> Cómo puedo realizar el sorteo?
                                        </h6>
                                        <p>
                                        Una vez registrada tu cuenta podras ingresar con tus credenciales, seleccionar la opción "Realizar Sorteo", luego 
                                        presionar el boton "Sortear" y se te mostrará en pantalla los trabajadores seleccionados.
                                    </p>
                                        </p>
                                    </div>
                                
                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <h6 class="mb-3 text-primary"><i class="fas fa-rocket text-primary pe-2"></i> Que pasa si al presionar el boton "Sorteo" no sucede nada 
                                        o me sale error?
                                        </h6>
                                        <p>
                                        Para esos casos esta la opción de realizar el sorteo manualmente. Para ello obtienes la información de los trabajadores de BuK, ingresas 
                                        ahora a la opción "Realizar Sorteo Manual", copias la información de Buk y presionas el botón "Sortear" y se te mostrará en pantalla los 
                                        trabajadores seleccionados.
                                        </p>
                                    </div>
                                
                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <h6 class="mb-3 text-primary"><i class="fas fa-home text-primary pe-2"></i> Cómo puedo ver los sorteos que ya he realizado?
                                        </h6>
                                        Debes seleccionar la opción "Historial", ahi podrás ingresar el rango de fecha correspondiente a los sorteos que quieres buscar. 
                                        Luego al ver los resultados, puedes presionar ver detalle y observaras los resultados, los cuales puedes exportar en un documento.
                                        </p>
                                    </div>
                                
                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <h6 class="mb-3 text-primary"><i class="fas fa-book-open text-primary pe-2"></i> Como puedo modificar el porcentaje de seleccion de trabajadores en un sorteo?
                                        </h6>
                                        <p>
                                        Solo el administrador puede modificar dicho porcentaje. Puedes contactarle:
                                        <a href="mailto:administadortps@tps.cl">administadortps@tps.cl</a>
                                        </p>
                                    </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('snippets.footer2')
</body>

</html>