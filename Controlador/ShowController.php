<?php
class ShowController {
    private $model;
    private $view;
    
    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }
    
    public function index() {
        $this->model->getConnection();
        $stmt = $this->model->getRecords();
        $this->view->render($stmt);
    }
}




?>