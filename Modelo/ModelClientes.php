<?php
require_once 'Model.php';
class ModelClientes extends Model {


//ingreso user a bd
public function Ingresar_clientes($direccion,$user,$correo,$telefono,$password,$nombre,$apellido,$dui,$hashver,$activo)
{
    $query='INSERT INTO clientes (id_tipo_u,nombre,apellido,telefono,direccion,dui,correo,contrasena,hash_verificar,activada) VALUES (:id_tipo_u,:nombre,:apellido,:telefono,:direccion,:dui,:correo,:contrasena,:hashver,:activada)';
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id_tipo_u', $user);
   // $stmt->bindParam(':id',$id);
    $stmt->bindParam(':telefono',$telefono);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':contrasena', $password);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':direccion',$direccion);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':dui', $dui);
    $stmt->bindParam(':hashver', $hashver);
    $stmt->bindParam(':activada', $activo);
    $stmt->execute();

}

//para comparar si ya o no existen ese user, correo o duis registrados en la bd
public function Validar_Repeticiones($correo,$dui,$user)
{
    $query="SELECT * FROM Clientes WHERE Correo=:correo AND dui=:dui AND id_cli=:user";
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
    $query="UPDATE clientes SET activada=1 WHERE hash_verificar=:codigo";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':codigo', $codigo);
    $stmt->execute();
}

//devuelve si la cuenta está activa
public function Validar_Active($correo)
{
    $query="SELECT * FROM Clientes WHERE correo=:correo AND activada=1";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
    return $cliente;
}

//devuelve coincidencias de sesion
public function Validar_clientes($correo, $psd)
{
    $query="SELECT * FROM clientes WHERE correo=:correo AND contrasena=:contrasena";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':contrasena', $psd);
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

}