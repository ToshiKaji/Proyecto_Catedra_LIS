<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Iniciar sesión</title>
    </head>
    <body class="bg-light">
        <div class="container">
            <header>
            <?php
                require_once('../Layout/Header.php');
            ?>
            </header>
            <div class="row">
                <div class="col-md-5 py-5">
                    <img src="img/comprasLog.png" alt="Carrito de compras" style="width: 50rem; position:absolute; bottom:0px; left:20px;">
                </div>
                <div class="col-md-7 py-5 d-flex flex-column justify-content-center align-items-center"> 
                    <br><br><br><br><br>
                    <div class="card" style="width: 28rem;">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <form action="index.php" method="get">
                                <h1 class="mb-4 text-center py-2">Max Cupones</h1>
                                <input type="text" name="correo" pattern="[A-Za-z0-9._-]+@[A-Za-z0-9\.-]+\.[a-zA-Z]{2,4}" class="form-control mb-2" 
                                placeholder="Correo eléctronico" style="width:22rem;" required>
                                <input type="password" name="contrasena" class="form-control mb-3" placeholder="Contraseña" style="width:22rem;" required>
                                <button type="submit" name="entrar" class="btn btn-danger text-light mb-4" style="border-radius:20px; width:22rem;">Iniciar sesión</button>
                                <input type="hidden" name="m" value="Validar_cliente">
                            </form>
                        </div>
                    </div>
                    <br>
                    <!--
                    <div class="card" style="width: 28rem;">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <label for="">¿No tienes cuenta? <a href="newLogin.php">Regístrate</a></label>
                        </div>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </body>
</html>