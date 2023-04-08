<?php
require_once('Modelo/index.php');
require_once('Vista/ClaseView.php');
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
    { $this->model->getConnection();
        $usercli=$_REQUEST['usercli'];
        $pwcli=$_REQUEST['pwcli'];
        $nombre=$_REQUEST['nombre'];
        $apellido=$_REQUEST['apellido'];
        $dui=$_REQUEST['dui'];
        $this->model->Ingresar_clientes($usercli,$pwcli,$nombre,$apellido,$dui);
        header("location:".urlsite);


    }


}




?>