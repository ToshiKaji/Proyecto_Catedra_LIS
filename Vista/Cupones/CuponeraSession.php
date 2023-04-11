<?php session_start();
if(!isset($_SESSION['cliente'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
                <a class="nav-link ms-5" data-bs-toggle="pill" style="color:#FFFFFF;" href="#">Inicio</a>
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
            </ul>
            <form action="index.php" method="get" class="ms-auto">
                <button class="btn btn-warning" type="submit">Cerrar sesión</button>
                <input type="hidden" name="m" value="CerrarSesion">
            </form>
            </div>
        </div>
    </nav> 
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