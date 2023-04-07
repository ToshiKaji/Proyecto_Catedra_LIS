<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php
require_once("Database/Database.php");
require_once("Controlador/ShowController.php");
require_once("Controlador/InsertController.php");
require_once("Controlador/HomeController.php");
require_once("Vista/index.php");
require_once("Vista/home.php");

$model = new Modelo();
$view = new View();



//con el boton de abajo se ejecuta la funcion que trae los datos de la base de datos
?>

<form method="post" action="index.php">
    <input type="submit" name="boton" value="Ver Tablas">
</form>
<?php //Form para  agregar un dato ?>
<form method="post" action="index.php">
<label>Codigo de rubro</label>
<input type="text" name="codrubro"><br>
<label>Rubro</label>
<input type="text" name="rubro"><br>
    <input type="submit" name="botoninsertar" value="Insertar datos">
</form>
<?php
//accion de mostrar tablas
if(isset($_POST['boton'])) 
{
$controller = new Controller($model, $view);
$controller->index();
}

//accion de meter valores a la tabla


//control de las vistas 
//boton para llamar a la vista home
?>

<form method="post" action="index.php">
    <input type="submit" name="botonhome" value="Renderiza home">
</form>


</body>
</html>