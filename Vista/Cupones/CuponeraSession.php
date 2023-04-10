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
       <!-- Nuevo Nav de inicio de sesion con boton para cerrarla, ya está el método para cerrarla --> 
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