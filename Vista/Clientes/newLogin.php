
 <!DOCTYPE html>
 <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Vista/Cupones/css/inicio.css">
    
        <title>Registrarse</title>
               <?php
require 'Vista/Header.php';
               ?>
    </head>
    <body style="background-image: url('<?php $root;echo PATH;?>/Vista/Clientes/img/fondo.jpg'); background-repeat: repeat; background-size:100%;">
        <div class="container">
            <header>
          
          
            <br><br>
            <?php 
            if(isset($_SESSION['cliente']))
            {    
            ?>  
            <div class="col-md-8 offset-md-2 py-5 d-flex flex-column justify-content-center align-items-center">
            <div class="card py-2" style="width: 28rem;">
            <h1 class="text-center text-primary">Ya tienes una cuenta</h1>
            <h3 class="text-center text-secondary">Si deseas crear una cuenta tiene que cerrar sesion en tu cuenta actual</h3>
            </div>
            </div>
            <?php
            }
            else
            {
                
                if(isset($errores)){
                    if(count($errores)>0){
                        echo "<div class='alert alert-danger'><ul>";
                        foreach ($errores as $error) {
                            echo "<li>$error</li>";
                        }
                        echo "</ul></div>";

                    }
                }
            ?>
            <div class="row">
                <div class="col-md-8 offset-md-2 py-5 d-flex flex-column justify-content-center align-items-center">
                    <div class="card py-2" style="width: 28rem;">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <form method="POST" action="<?=PATH?>/Clientes/Ingresar_cliente">
                                <h1 class="mb-2 text-center">La Cuponera</h1>
                                <h6 class="mb-2 text-center py-1 text-secondary">Regístrate para comprar nuestros productos</h6>
                                <input type="text" name="nombre" value="<?= isset($cliente_nuevo)?$cliente_nuevo['nombre']:'';?>" class="form-control mb-2" placeholder="Nombre" 
                                style="width:22rem;" required>
                                <input type="text" name="apellido" value="<?= isset($cliente_nuevo)?$cliente_nuevo['apellido']:'';?>" class="form-control mb-2" placeholder="Apellido" 
                                style="width:22rem;" required>
                                <input type="text" name="dui" value="<?= isset($cliente_nuevo)?$cliente_nuevo['dui']:'';?>" class="form-control mb-2" placeholder="DUI" 
                                style="width:22rem;" required>
                                <input type="text" name="direccion" value="<?= isset($cliente_nuevo)?$cliente_nuevo['direccion']:'';?>" class="form-control mb-2" placeholder="Direccion" 
                                style="width:22rem;" required>
                                <input type="text" name="telefono" value="<?= isset($cliente_nuevo)?$cliente_nuevo['telefono']:'';?>" class="form-control mb-2" placeholder="Telefono" 
                                style="width:22rem;" required>
                                <input type="text" name="correo" value="<?= isset($cliente_nuevo)?$cliente_nuevo['correo']:'';?>" id="correo" pattern="[A-Za-z0-9._-]+@[A-Za-z0-9\.-]+\.[a-zA-Z]{2,4}" 
                                class="form-control mb-2" placeholder="Correo eléctronico" style="width:22rem;" required>
                                <input type="password" name="contrasena" id="contrasena" class="form-control mb-3" placeholder="Contraseña" 
                                style="width:22rem;" required>
                               
                                <p class="mb-3 text-center py-1 text-secondary">Antes de registrarte se te enviará<br> un correo para que verifiques tu cuenta.</p>
                                <button type="submit" class="btn btn-danger text-light mb-2" 
                                style="border-radius:20px; width:22rem;">Enviar correo de verificacion</button>
                               
                                <hr>
                                <h6 class="text-center text-secondary">¿Ya tienes cuenta? <a href="<?=PATH?>/Clientes/Ingresar">Inicia sesión</a></h6>
                            </form>
                          
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
</header>
        <footer>
            <?php
                include_once 'Vista/Footer.php';
            ?>
        </footer>
    </body>
</html>