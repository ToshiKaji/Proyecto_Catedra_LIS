<?php 
require_once 'Controller.php';
require_once 'Modelo/ModelCupones.php';


class ControllerCupones extends Controller
{
    private $model;
    public function Inicio()
    {
        $this->render('Inicio.php');
    }

    public function Inicio_cupones($categoria)
    {
        $this->model=new ModelCupones();
      
        $this->model->getConnection();
       $data = $this->model->listaCupones($categoria);

    $this->render('Inicio.php',$data);
        
    }
    public function Completar_compra($info){
        $codigo=$info;
        $codigo=explode(".",$codigo);

        $this->render('Compra.php',$codigo);
    }

    public function Mis_cupones($id_cliente)
    {
        $this->model=new ModelCupones();
        $this->model->getConnection();
        $data=$this->model->Cupones_comprados($id_cliente);
        $this->render('MisCupones.php',$data);

    }

    public function Comprar($info)
    {
        my_session_start();
  
        $n_tarjeta=$_POST['n_tarjeta'];
        $fecha=$_POST['fecha'];
        $cvv=$_POST['cvv'];

        if(Tarjeta($n_tarjeta,$fecha,$cvv)== true)
        {
        $this->model=new ModelCupones();
        $this->model->getConnection();
        $this->model->Comprar($info);
        $this->render('Inicio.php');
        }
        else
        {
      
            $this->render('Compra.php',$_SESSION['codigo']);
        }
    }



}