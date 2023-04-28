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
                require_once('Vista/Header.php');
           
            ?>
            </header>
            <div class="row">
                <div class="col-md d-flex flex-column justify-content-center align-items-center"> 
                    <br><br><br><br><br>
                    <?php
 if(isset($viewBag)){
    if(count($viewBag)>0){
        echo "<div class='alert alert-danger'><ul>";
        foreach ($viewBag as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul></div>";

    }
}
?>
                    <div class="card mb-5" style="width: 28rem;">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <form action="<?=PATH?>/Clientes/Validar_cliente" method="post">
                                <h1 class="mb-4 text-center py-2">La Cuponera</h1>
                                <input type="text" name="correo_login" pattern="[A-Za-z0-9._-]+@[A-Za-z0-9\.-]+\.[a-zA-Z]{2,4}" class="form-control mb-2" 
                                placeholder="Correo eléctronico" style="width:22rem;" required>
                                <input type="password" name="contrasena_login" class="form-control mb-3" placeholder="Contraseña" style="width:22rem;" required>
                                <button type="submit" name="entrar" class="btn btn-danger text-light mb-4" style="border-radius:20px; width:22rem;">Iniciar sesión</button>
                                <input type="hidden" name="m" value="Validar_cliente">
                                <h6 class="text-center text-secondary">ó</h6>
                                <a href="<?=PATH?>/Clientes/Recuperacion"><h6 class="text-center text-secondary">¿Olvidaste tu contraseña?</h6></a>
                                <hr class="mb-3">
                                <h6 class="text-center text-secondary">¿Aún no tienes cuenta? <a href="<?=PATH?>/Clientes/Registrar">Regístrate</a></h6>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <?php
                include_once('Vista/Footer.php');
            ?>
        </footer>
    </body>
</html>