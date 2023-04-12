<?php session_start();

if (!isset($_SESSION['cliente'])) {
    if (!isset($_SESSION['cupones'])) {
        header("location:../Usuarios/index.php?m=inicioCupones"); //Para refrescar la sesion yendo a traer a la BD
    }
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
              crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
                <link href="css/inicio.css">
        <title>La Cuponera</title>
    </head>
    <script>

    </script>
    <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-danger">
            <div class="container-fluid d-flex">
            <span class="navbar-brand mb-0 h1 ms-5" style="color:#FFFFFF; font-weight: bold;"
                  href="../Cupones/Inicio.php">
            <img src="../Layout/img/cupon.png" alt="LOGO" width="30" height="24" class="d-inline-block align-text-top">
            LA CUPONERA</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link ms-5" style="color:#FFFFFF;"
                               href="../Usuarios/index.php?m=inicioCupones&f=0">Inicio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" style="color:#FFFFFF;" href="../Usuarios/index.php?m=inicioCupones&f=1">Belleza</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color:#FFFFFF;" href="../Usuarios/index.php?m=inicioCupones&f=2">Lugares</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color:#FFFFFF;" href="../Usuarios/index.php?m=inicioCupones&f=3">Servicios</a>
                        </li>
                    </ul>
                    <form action="index.php" method="get" class="ms-auto">
                        <button class="btn btn-warning" type="submit">Cerrar sesión</button>
                        <input type="hidden" name="m" value="CerrarSesion">
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row m-2">
            <div class="col">
                <h4>Filtrando cupones por:
                    <?php
                    switch ($_SESSION['categoria']) {
                        case 1:
                        {
                            echo 'Belleza';
                            break;
                        }
                        case 2:
                        {
                            echo 'Lugares';
                            break;
                        }
                        case 3:
                        {
                            echo 'Servicios';
                            break;
                        }
                        default :
                        {
                            echo 'Todos';
                            break;
                        }
                    }
                    ?>
                </h4>
            </div>
        </div>

        <hr>

        <div class="row m-2">
            <?php
            $data_recibida = $_SESSION['cupones']; //Cupones generados (Traidos desde la BD)

            foreach ($data_recibida as $cupon) { ?>
                <div class="card bg-dark text-white m-2 p-1 border-5" style="width: 18rem;">

                    <img src="<?= ($cupon['img']) ?>" class="card-img" alt="Cupon" height="150">

                    <hr>
                    <div class="card-body p-1">
                        <h5 class="card-title"><?= utf8_encode($cupon['titulo_oferta']) ?></h5>
                        <p class="card-text"><?= utf8_encode($cupon['descripcion']) ?></p>
                        <p class="card-text">Precio Regular: $<?= utf8_encode($cupon['precio_regular']) ?></p>
                        <p class="card-text">Descuento: <?= utf8_encode($cupon['porcentaje_oferta']) ?>%</p>
                        <p class="card-text text-success">Nuevo valor:
                            $<?= number_format($cupon['precio_regular'] - ($cupon['precio_regular'] * ($cupon['porcentaje_oferta'] * 0.01)),
                                2)
                            ?></p>
                        <p class="card-text">Fecha
                            Límite: <?= date_format(date_create($cupon['fecha_limite']), 'd/m/Y') ?></p>
                        <p class="card-text">Stock: <?= utf8_encode($cupon['cantidad']) ?></p>
                    </div>
                    <a href="#" class="btn btn-success">Comprar</a>

                </div>

            <?php } ?>


        </div>
    </div>

    <footer>
        <?php
        unset($_SESSION['categoria']);
        unset($_SESSION['cupones']);
        include_once('../Layout/Footer.php');
        ?>
    </footer>
    </body>

    </html>
    <?php
} else {
    header("location:../Usuarios/login.php");
}
?>