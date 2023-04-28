
<!DOCTYPE html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Vista/Cupones/css/inicio.css">
    <title>La Cuponera</title>
     
</head>
<body>      
<?php
    include_once 'Vista/Header.php';
    
    ?>  
      <?php
        if(empty($viewBag))
        {?>
    <header>
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">

          <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item" data-interval="5000">
              <img class="overlay-image d-block w-100" id="imagen" src="<?=PATH?>/Vista/Cupones/img/park.jpg" alt="spa">
              <div class="container">
                <div class="carousel-caption text-start">
                  <h1>Disfruta de excelentes servicios <br> sin preocuparte por tu dinero</h1>
                  <p>Cupones de descuento de spa, restaurantes, parques de diversiones, cine y sauna.</p>
                </div>
              </div>
            </div>
            <div class="carousel-item active" data-interval="5000">
              <img class="overlay-image d-block w-100" id="imagen" src="<?=PATH?>/Vista/Cupones/img/cine.jpg" alt="cine">
                <div class="container">
                  <div class="carousel-caption">
                    <h1>¡Regístrate en La Cuponera y <br> disfruta de sus ofertas!</h1>
                    <p>¿Qué esperas para empezar a comprar?</p>
                    <p><a class="btn btn-lg btn-outline-warning" href="<?=PATH?>/Clientes/Registrar">Registrarse</a></p>
                  </div>
                </div>
            </div>
            <div class="carousel-item" data-interval="5000">
              <img class="overlay-image d-block w-100" id="imagen" src="<?=PATH?>/Vista/Cupones/img/make-up.jpg" alt="Makeup">
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
   <?php
        }
   else
   {
    //var_dump($viewBag);
    ?>
 <div class="row m-2">
            <?php

            
            $data_recibida = $viewBag; //Cupones generados (Traidos desde la BD)

            foreach ($data_recibida as $cupon) { ?>

                <div class="card bg-dark text-white m-2 p-1 border-5" style="width: 18rem;">

                    <img src="<?= ($cupon['imagen']) ?>" class="card-img" alt="Cupon" height="150">

                    <hr>
                    <div class="card-body p-1">
                        <h5 class="card-title"><?= utf8_encode($cupon['titulo_oferta']) ?></h5>
                        <p class="card-text"><?= utf8_encode($cupon['descripcion']) ?></p>
                        <p class="card-text">Precio Regular: $<?= utf8_encode($cupon['precio_regular']) ?></p>
                        <p class="card-text">Descuento: <?= utf8_encode($cupon['porc_oferta']) ?>%</p>
                        <p class="card-text text-success">Nuevo valor:
                            $<?= number_format($cupon['precio_regular'] - ($cupon['precio_regular'] * ($cupon['porc_oferta'] * 0.01)),
                                2)
                            ?></p>
                        <p class="card-text">Fecha
                            Límite: <?= date_format(date_create($cupon['fecha_lim']), 'd/m/Y') ?></p>
                        <p class="card-text">Stock: <?= utf8_encode($cupon['cantidad_lim']) ?></p>
                    </div>
                    <?php
if (isset($_SESSION['cliente'])) {?>
                    <a href="<?=PATH?>/Cupones/Completar_compra/<?php echo $cupon['id_cu'].'.'.$cupon['cod_empresa'].'.'.$_SESSION['cliente']['dui'].'.'.$_SESSION['cliente']['id_cli']?>" class="btn btn-success">Comprar</a>
<?php
}
?>
                </div>

            <?php } ?>

            
        </div>
    <?php
   }
   ?>
    </header>
    <footer>
      <?php  
    include_once 'Vista/Footer.php';
      ?>
    </footer>
</body>
</html>