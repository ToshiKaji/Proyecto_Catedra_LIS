<?php

class Modelo {
    private $host = "localhost";
    private $db_name = "lis_pro";
    private $username = "root";
    private $password = "123456";
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
    
    public function Mostrar() {
        $query = 'SELECT * FROM rubros';
        $stmt = $this->conn->prepare($query);
       $stmt->execute();
       return $stmt;
    }

    public function Ingresar_clientes($user,$password,$nombre,$apellido,$dui)
    {
        $query='INSERT INTO clientes (UserCli,PwCli,Nombre,Apellido,DUI) VALUES (:usercli,:pwcli,:nombre,:apellido,:dui)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':usercli', $user);
        $stmt->bindParam(':pwcli', $password);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':dui', $dui);
        $stmt->execute();

    }

    
}
?>
