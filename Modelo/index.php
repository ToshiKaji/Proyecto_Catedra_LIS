<?php

class Modelo {
    private $host = "localhost";
    private $db_name = "lis_pro";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }

    //ingraso user a bd
    public function Ingresar_clientes($user,$correo,$password,$nombre,$apellido,$dui,$hashver,$activo)
    {
        $query='INSERT INTO Clientes (UserCli,Correo,PwCli,Nombre,Apellido,DUI,HashVer,Activo) VALUES (:usercli,:correo,:pwcli,:nombre,:apellido,:dui,:hashver,:activo)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':usercli', $user);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':pwcli', $password);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':dui', $dui);
        $stmt->bindParam(':hashver', $hashver);
        $stmt->bindParam(':activo', $activo);
        $stmt->execute();

    }

    //para comparar si ya o no existen ese user, correo o duis registrados en la bd
    public function Validar_Repeticiones($correo,$dui,$user)
    {
        $query="SELECT * FROM Clientes WHERE Correo=:correo AND DUI=:dui AND UserCli=:user";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':dui', $dui);
        $stmt->bindParam(':user', $user);
        $stmt->execute();
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
        return $cliente;
    }

    //devuelve si el codigo existe en algun usuario
    public function ActivacionValues($codigo)
    {
        $query="SELECT * FROM Clientes WHERE HashVer=:codigo";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->execute();
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
        return $cliente;
    }

    //activa cuenta actualizando la BD
    public function Activando($codigo)
    {
        $query="UPDATE Clientes SET Activo=1 WHERE HashVer=:codigo";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->execute();
    }

    //devuelve si la cuenta está activa
    public function Validar_Active($correo)
    {
        $query="SELECT * FROM Clientes WHERE Correo=:correo AND Activo=1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
        return $cliente;
    }

    //devuelve coincidencias de sesion
    public function Validar_clientes($correo, $psd)
    {
        $query="SELECT * FROM Clientes WHERE Correo=:correo AND PwCli=:psd";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':psd', $psd);
        $stmt->execute();
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
        return $cliente;
    }

    public function Nueva_Psd($correo, $cod_gen)
    {
        $query="UPDATE Clientes SET PwCli=:cod_gen WHERE Correo=:correo";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':cod_gen', $cod_gen);
        $stmt->execute();
    }
    public function listaCupones($estado, $id_rubro){

        if($id_rubro == null || $id_rubro == 0){
            $query="SELECT * FROM cupones where estado=:estado";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':estado', $estado);
        }else{
            $query="SELECT * FROM cupones where estado=:estado AND id_rubro=:id_rubro";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':id_rubro', $id_rubro);
        }


        $stmt->execute();
        $arrData = [];
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $arrData[] = $fila;
        }
        return $arrData;
    }
}
?>
