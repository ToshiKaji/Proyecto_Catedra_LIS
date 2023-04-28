<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Recuperación de contraseña</title>
    </head>
    <body class="bg-light">
        <div class="container">
            <header>
            <?php
                 include 'Vista/Header.php';
            ?>
            </header>
            <div class="row">
                <div class="col-md d-flex flex-column justify-content-center align-items-center"> 
                    <br><br><br><br><br>
                    <div class="card mb-5" style="width: 40rem;">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <form action="index.php" method="get">
                                <h4 class="mb-1 text-center py-3">¿Tienes problemas para entrar?</h4>
                                <p class="mb-3 text-center text-secondary py-1">Introduce tu correo electrónico y <br> te enviaremos un correo con tu<br> nueva contraseña.</p>
                                <input type="text" name="correo" id="correo" pattern="[A-Za-z0-9._-]+@[A-Za-z0-9\.-]+\.[a-zA-Z]{2,4}" 
                                class="form-control mb-2" placeholder="Correo eléctronico" style="width:22rem;" required>
                                <button type="submit" name="verificar" class="btn btn-danger text-light mb-2" 
                                style="border-radius:20px; width:22rem;">Enviar correo de verificación</button>
                                <input type="hidden" name="m" value="Recuperacion_Cuenta">
                                <h6 class="text-center text-secondary">ó</h6>
                                <a href="<?=PATH?>/Clientes/Ingresar"><h6 class="text-center text-secondary">Volver a inicio de sesión</h6></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <?php
               include 'Vista/Footer.php';
            ?>
        </footer>
    </body>
</html>