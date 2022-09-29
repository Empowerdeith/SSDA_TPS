
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/Styles.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Title of the document</title>
</head>
<body>
<h1 class="text-center">Estos son los trabajadores seleccionados: </h1>
@if (isset($data))
    @foreach ( $data as $element )
        <h2>{{$element[0]}} {{$element[1]}} {{$element[2]}} </h2>

    @endforeach
@endif
<!-- Footer -->
<footer class="text-center  text-white text-lg-start">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Síguenos en nuestras redes sociales:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="https://www.facebook.com/TPSValparaiso/" class="me-4 link-secondary">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://twitter.com/TPS_Valparaiso" class="me-4 link-secondary">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="https://www.youtube.com/channel/UCiaVT5duAI687mxOqghHCBw/featured" class="me-4 link-secondary">
          <i class="fab fa-youtube"></i>
        </a>
        <a href="https://www.instagram.com/tps_valparaiso/" class="me-4 link-secondary">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="https://www.linkedin.com/company/1394617?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A1394617%2Cidx%3A1-1-1%2CtarId%3A1444153826149%2Ctas%3Aterminal%20pacifico%20" class="me-4 link-secondary">
          <i class="fab fa-linkedin"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="border-bottom">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              Terminal Pacífico Sur Valparaíso - Chile.
            </h6>
            <p>
                Nuestra trayectoria está marcada por constante crecimiento, competitividad y eficiencia.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              ¿Quiénes Somos?
            </h6>
            <p>
              <a href="#!" class="text-reset">Historia</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Valores TPS</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Nuestro Terminal</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Directorio</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Enlaces útiles
            </h6>
            <p>
              <a href="#!" class="text-reset">TPS BUK</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Acádemia TPS</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Soporte</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Ayuda</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contactános</h6>
            <p><i class="fas fa-home me-3 text-secondary"></i> Antonio Varas Nº 2. Piso 3.</p>
            <p>
              <i class="fas fa-envelope me-3 text-secondary"></i>
              atencioncliente@tpsv.cl
            </p>
            <p><i class="fas fa-phone me-3 text-secondary"></i> + 56-32-2275800</p>
            <p><i class="fas fa-print me-3 text-secondary"></i> + 56-32-2275813</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
      © 2022 Derechos de autor:
      <a class="text-reset fw-bold" href="#">Tps.cl</a>
    </div>
    <!-- Copyright -->
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </footer>
  <!-- Footer -->

</body>

</html>
