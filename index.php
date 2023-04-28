<?php
require_once("config.php");
require_once("Controlador/ControllerClientes.php");
require_once("Controlador/ControllerCupones.php");
require_once ("Validaciones.php");

$url=$_SERVER['REQUEST_URI'];
define('BASEPATH',true);
//session_start();//Iniciando sesion
$url=explode("/",$url);
$controller="Controller";
$controller.=empty($url[3])?"Cupones":$url[3];
$fileController="Controlador/$controller.php";
$method=empty($url[4])?"Inicio":$url[4];
$param=empty($url[5])?"":$url[5];
if(!is_file($fileController)){
    var_dump($fileController);
    echo "<h1>Error 404</h1>";
    exit;
}
$controlador=new $controller();
if(!method_exists($controlador,$method)){
    echo "<h1>Error 404</h1>";
    exit;
}
$controlador->$method($param)

 

?>