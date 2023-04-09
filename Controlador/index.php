<?php
require_once('./Modelo/index.php');
require_once('./Vista/ClaseView.php');

class Controller {
    private $model;
    private $view;
    
    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    //funcion de prueba para mostrar dato, muestra datos de la tabla de 'rubros'
     function Index() {
        
        $this->model->getConnection();
     $stmt = $this->model->Mostrar();
        require_once('Vista/index.php');
        $this->view->Render($stmt);
    }

    public function Registro()
    {
        require_once('Vista/index.php');
        $this->view->RenderRegistro();
    }

    public function Ingresar_cliente()
    { 
        $this->model->getConnection();
        $usercli=$_REQUEST['user'];
        $correo=$_REQUEST['correo'];
        $pwcli=$_REQUEST['contrasena'];
        $nombre=$_REQUEST['nombre'];
        $apellido=$_REQUEST['apellido'];
        $dui=$_REQUEST['dui'];
        $this->model->Ingresar_clientes($usercli,$correo,$pwcli,$nombre,$apellido,$dui);
        header("location:../Cupones/CuponeraSession.php");
    }

    public function Validar_cliente()
    {
        $this->model->getConnection();
        $correo=$_REQUEST['correo'];
        $pwcli=$_REQUEST['contrasena'];
        
        if($this->model->Validar_clientes($correo,$pwcli))
        {
            $cliente = $this->model->Validar_clientes($correo,$pwcli);
            $_SESSION['cliente'] = $cliente['Nombre'];
            header("location:../Cupones/CuponeraSession.php");
        }
        else{
            echo "<script>alert('El correo y/o la contraseña no son válidos.');
            window.location.href='../Usuarios/login.php';</script>";

        }
    }

    public function CerraSesion()
    {
        session_unset();
        session_destroy();
        header("location:../Cupones/Inicio.php");
    }

}




?>