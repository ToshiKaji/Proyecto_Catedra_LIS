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

    //Ejemplo de mostrar
    public function Mostrar() {
        $query = 'SELECT * FROM rubros';
        $stmt = $this->conn->prepare($query);
       $stmt->execute(); 
       return $stmt;
    }

    public function Ingresar_clientes($user,$correo,$password,$nombre,$apellido,$dui)
    {
        $query='INSERT INTO Clientes (UserCli,Correo,PwCli,Nombre,Apellido,DUI) VALUES (:usercli,:correo,:pwcli,:nombre,:apellido,:dui)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':usercli', $user);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':pwcli', $password);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':dui', $dui);
        $stmt->execute();

    }

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

    
}
?>
