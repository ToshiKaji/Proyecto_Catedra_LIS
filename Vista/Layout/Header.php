 <!-- En este documento pueden agregar botonos o el header que solo se agregara a a renderizacion-->
  <!-- y no haria falta configurarlo varias veces-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Cuponera</title>
    <!-- No esxiste la funcion Login() en el controlador--> 
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm fixed-top navbar-light bg-danger" style="padding: 10px;">
            <a class="navbar-brand" style="color:#FFFFFF; font-weight: bold;" href="#">
            <img src="../Layout/img/cupon.png" width="30" height="30" class="d-inline-block align-top" alt="logo">
            Max Cupones
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
                        <a class="nav-link" style="color:#FFFFFF;" href="login.php">Iniciar sesión</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" style="color:#FFFFFF;" href="newLogin.php">Registrarse</a>
                    </li>
                    </ul>
                </div>
        </nav>
    </header>
 <!-- aqui va a ir codigo-->
</body>