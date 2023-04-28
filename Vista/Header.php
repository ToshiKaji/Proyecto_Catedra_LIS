<?php $root=$_SERVER['DOCUMENT_ROOT'];
my_session_start();
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
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-danger">
        <div class="container-fluid d-flex">
            <a class="navbar-brand mb-0 h1 ms-5" style="color:#FFFFFF; font-weight: bold;" href="<?=PATH?>">
            <img src="<?php echo PATH;?>/Vista/img/cupon.png" alt="LOGO" width="30" height="24" class="d-inline-block align-text-top">    
            LA CUPONERA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav nav-pills">
                <li class="nav-item">
                <a class="nav-link" style="color:#FFFFFF;" href="<?=PATH?>/Cupones/Inicio_cupones/">Nuestros cupones</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color:#FFFFFF;" href="<?=PATH?>/Cupones/Inicio_cupones/3">Belleza</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color:#FFFFFF;" href="<?=PATH?>/Cupones/Inicio_cupones/3">Lugares</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color:#FFFFFF;" href="<?=PATH?>/Cupones/Inicio_cupones/2">Servicios</a>
</li>
            
 
  <?php
if (isset($_SESSION['cliente'])) {?>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color:#FFFFFF;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Ajustes</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="<?=PATH?>/Cupones/Mis_cupones/<?php echo $_SESSION['cliente']['id_cli'];?>">Mis cupones</a></li>
                    <li><a class="dropdown-item" href="<?=PATH?>/Clientes/Recuperacion">Cambiar contraseña</a></li>
                    <li><a class="dropdown-item" href="#">Ayuda</a></li>
                </ul>
                </li>
                </ul>
<form action="<?=PATH?>/Clientes/CerrarSesion" method="post" class="ms-auto">
                        <button class="btn btn-warning" type="submit">Cerrar sesión</button>
                       
                    </form>
                    <?php 
                    }
                    else
                    {
                        ?>
                        </ul>
<form action="<?=PATH?>/Clientes/Ingresar" method="post" class="ms-auto">
                        <button class="btn btn-warning" type="submit">Ingresar</button>
                       
                    </form>
                    
                    <?php
                    }
                    ?>
            </div>
        </div>
    </nav>
    </header>
</body>