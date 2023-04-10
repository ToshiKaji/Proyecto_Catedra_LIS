<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Cupones/css/inicio.css">
    <title>La Cuponera</title>
</head>
<body>
    <header>
        <?php
          include_once('../Layout/Header.php');
        ?>
        
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item" data-interval="5000">
              <img class="overlay-image d-block w-100" id="imagen" src="../Cupones/img/park.jpg" alt="spa">
              <div class="container">
                <div class="carousel-caption text-start">
                  <h1>Disfruta de excelentes servicios <br> sin preocuparte por tu dinero</h1>
                  <p>Cupones de descuento de spa, restaurantes, parques de diversiones, cine y sauna.</p>
                </div>
              </div>
            </div>
            <div class="carousel-item active" data-interval="5000">
              <img class="overlay-image d-block w-100" id="imagen" src="../Cupones/img/cine.jpg" alt="cine">
                <div class="container">
                  <div class="carousel-caption">
                    <h1>¡Regístrate en La Cuponera y <br> disfruta de sus ofertas!</h1>
                    <p>¿Qué esperas para empezar a comprar?</p>
                    <p><a class="btn btn-lg btn-outline-warning" href="../Usuarios/newLogin.php">Registrarse</a></p>
                  </div>
                </div>
            </div>
            <div class="carousel-item" data-interval="5000">
              <img class="overlay-image d-block w-100" id="imagen" src="../Cupones/img/make-up.jpg" alt="Makeup">
                <div class="container">
                  <div class="carousel-caption text-end">
                    <h1>Desde de artículos hogareños hasta <br> artículos de belleza</h1>
                    <p>Contamos con cupones de descuento para maquillaje, salones de belleza, <br> tratamientos, ¡y más!</p>
                  </div>
                </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </header>
    <footer>
      <?php
        include_once('../Layout/Footer.php');
      ?>
    </footer>
</body>
</html>