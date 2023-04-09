 <!-- En este documento pueden agregar botonos o el header que solo se agregara a a renderizacion-->
  <!-- y no haria falta configurarlo varias veces-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>La Cuponera</title>
    <!-- No esxiste la funcion Login() en el controlador--> 
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm fixed-top navbar-light bg-danger" style="padding: 10px;">
            <a class="navbar-brand" style="color:#FFFFFF; font-weight: bold;" href="../Cupones/Inicio.php">
            <img src="../Layout/img/cupon.png" width="30" height="30" class="d-inline-block align-top" alt="logo">
            MAX CUPONES
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" style="color:#FFFFFF;" href="../Cupones/Inicio.php">Inicio<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" style="color:#FFFFFF;" href="../Usuarios/login.php">Iniciar sesión</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" style="color:#FFFFFF;" href="../Usuarios/newLogin.php">Registrarse</a>
                    </li>
                    </ul>
                </div>
        </nav>
    </header>
 <!-- aqui va a ir codigo-->
</body>