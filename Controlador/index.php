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

    public function Nuevo ()
    {
        require_once('Vista/index.php');
        $this->view->RenderLogin();
    }
}




?>