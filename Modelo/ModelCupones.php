<?php
require_once 'Model.php';

class ModelCupones extends Model 
{
    
    public function listaCupones($categoria_obtenida){
        $activado=1;
        $categoria="%".$categoria_obtenida;

      if(empty($categoria)){
  $query="SELECT * FROM cupones where activado=:activado AND fecha_ini <= CURDATE() AND fecha_fin >= CURDATE()";
  $stmt = $this->conn->prepare($query);
  $stmt->bindParam('activado',$activado);
 
       }else{
           $query="SELECT * FROM cupones where activado=:activado AND cod_empresa LIKE :categoria AND fecha_ini <= CURDATE() AND fecha_fin >= CURDATE()";
           $stmt = $this->conn->prepare($query);
           $stmt->bindParam(':categoria',$categoria);
           $stmt->bindParam('activado',$activado);
       }


        $stmt->execute();
        $arrData = [];
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $arrData[] = $fila;
        }
        return $arrData;
    }

    public function Comprar($info)
    {
     $info_array=explode(".",$info);
     $codigo_canjeo=$info_array[0];
     $id_cliente=$info_array[1];
     $id_cupon=$info_array[2];
     $canjeo=0;

     $query="INSERT INTO cupones_comprados(codigo_canjeo,id_cliente,id_cupon,canjeo) VALUES (:codigo_canjeo,:id_cliente,:id_cupon,:canjeo)";
     $stmt=$this->conn->prepare($query);
     $stmt->bindParam(':codigo_canjeo',$codigo_canjeo);
     $stmt->bindParam(':id_cliente',$id_cliente);
     $stmt->bindParam(':id_cupon',$id_cupon);
     $stmt->bindParam(':canjeo',$canjeo);
     $stmt->execute();

    }

    public function Cupones_comprados($id_cliente)
    {$query="SELECT * FROM cupones_comprados where id_cliente=:id_cliente";
        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(':id_cliente',$id_cliente);
        $stmt->execute();
        $arrData = [];
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $arrData[] = $fila;
        }
        return $arrData;
    }

}
