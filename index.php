<?php
 require_once("Controlador/index.php");
require_once("Modelo/index.php");
require_once("Vista/ClaseView.php");
$model= new Modelo();
$view = new View();
$controller= new Controller($model,$view);


 if(isset($_GET['m']))
 {
    if(method_exists($controller,$_GET['m']))
    {
      $controller->{$_GET['m']}();
    }
 }
 else
 {
 $controller->Index();
 }