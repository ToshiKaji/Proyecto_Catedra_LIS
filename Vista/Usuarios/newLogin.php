<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Registrarse</title>
    </head>
    <body style="background-image: url('img/fondo.jpg'); background-repeat: repeat; background-size:100%;">
        <div class="container">
            <header>
            <?php
                require_once('../Layout/Header.php');
            ?>
            </header>
            <br><br>
            <div class="row">
                <div class="col-md-8 offset-md-2 py-5 d-flex flex-column justify-content-center align-items-center">
                    <div class="card py-2" style="width: 28rem;">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <form method="get" action="index.php">
                                <h1 class="mb-2 text-center">La Cuponera</h1>
                                <h6 class="mb-2 text-center py-1 text-secondary">Regístrate para comprar nuestros productos</h6>
                                <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre" 
                                style="width:22rem;" required>
                                <input type="text" name="apellido" class="form-control mb-2" placeholder="Apellido" 
                                style="width:22rem;" required>
                                <input type="text" name="dui" class="form-control mb-2" placeholder="DUI" 
                                style="width:22rem;" required>
                                <input type="text" name="user" class="form-control mb-2" placeholder="Username" 
                                style="width:22rem;" required>
                                <input type="text" name="correo" id="correo" pattern="[A-Za-z0-9._-]+@[A-Za-z0-9\.-]+\.[a-zA-Z]{2,4}" 
                                class="form-control mb-2" placeholder="Correo eléctronico" style="width:22rem;" required>
                                <input type="password" name="contrasena" id="contrasena" class="form-control mb-3" placeholder="Contraseña" 
                                style="width:22rem;" required>
                                <p class="mb-3 text-center py-1 text-secondary">Antes de registrarte se te enviará<br> un correo para que verifiques tu cuenta.</p>
                                <button type="submit" name="registrar" class="btn btn-danger text-light mb-2" 
                                style="border-radius:20px; width:22rem;">Enviar correo de verificación</button>
                                <input type="hidden" name="m" value="Ingresar_cliente">
                                <hr>
                                <h6 class="text-center text-secondary">¿Ya tienes cuenta? <a href="../Usuarios/login.php">Inicia sesión</a></h6>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <?php
                include_once('../Layout/Footer.php');
            ?>
        </footer>
    </body>
</html>