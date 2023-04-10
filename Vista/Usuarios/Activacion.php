<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Activacion</title>
    </head>
    <body class="bg-light">
        <div class="container">
            <header>
            <?php
                require_once('../Layout/Header.php');
            ?>
            </header>
            <div class="row">
                <div class="col-md d-flex flex-column justify-content-center align-items-center"> 
                    <br><br><br><br><br>
                    <div class="card mb-5" style="width: 40rem;">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <form action="index.php" method="get">
                                <h4 class="mb-1 text-center py-3">Ingresa tu código y<br>verifica tu cuenta</h4>
                                <input type="text" name="cod" class="form-control mb-2" placeholder="Código de verificación" 
                                style="width:22rem;" required>
                                <button type="submit" name="verificar" class="btn btn-warning mb-2" 
                                style="border-radius:20px; width:22rem;">Verificar cuenta</button>
                                <input type="hidden" name="m" value="ActivarCuenta">
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