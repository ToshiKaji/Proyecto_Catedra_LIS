<?php session_start();
if(!isset($_SESSION['cliente'])){ //no me cumple por el momento que edito la vista
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/72cbe709ce.js" crossorigin="anonymous"></script>
    <title>La Cuponera</title>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-danger">
        <div class="container-fluid d-flex">
            <span class="navbar-brand mb-0 h1 ms-5" style="color:#FFFFFF; font-weight: bold;" href="../Cupones/Inicio.php">
            <img src="../Layout/img/cupon.png" alt="LOGO" width="30" height="24" class="d-inline-block align-text-top">    
            LA CUPONERA</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav">
                <li class="nav-item">
                <a class="nav-link ms-5" style="color:#FFFFFF;" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit" id="mostrar">
                <img src="../Cupones/img/carrito.png" alt=""></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color:#FFFFFF;" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color:#FFFFFF;" href="#">Belleza</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color:#FFFFFF;" href="">Lugares</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color:#FFFFFF;" href="">Servicios</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color:#FFFFFF;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Ajustes
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="../Cupones/MisCupones.php">Mis cupones</a></li>
                    <li><a class="dropdown-item" href="#">Cambiar contraseña</a></li>
                    <li><a class="dropdown-item" href="#">Ayuda</a></li>
                </ul>
                </li>
            </ul>
            <form action="index.php" method="get" class="ms-auto">
                <button class="btn btn-warning" type="submit">Cerrar sesión</button>
                <input type="hidden" name="m" value="CerrarSesion">
            </form>
            </div>
        </div>
    </nav> 
    <!--Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Mi Carrito</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <h4>Resumen: </h4>
                <hr>
                <a type="button" class="btn btn-danger" href="#">Vaciar carrito</a>
                <a type="button" class="btn btn-success" href="../Cupones/Compra.php">Continuar pedido</a>
                </div>
            </div>
        </div>
    </div>
    </header>

    <!-- Lugar para poner todos los cupones extraídos de la tabla -->

    <footer>
        <?php
            include_once('../Layout/Footer.php');
        ?>
    </footer>
</body>
</html>
<?php
    }else{
        header("location:../Usuarios/login.php");
    }
?>