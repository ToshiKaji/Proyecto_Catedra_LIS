<?php
class InsertController
{
public function Insert($codrubro, $rubro) {
    $model = new Database();
    $conn = $model->getConnection();

    $stmt = $conn->prepare("INSERT INTO rubros (CodRubro, Rubro) VALUES (:codrubro, :rubro)");
    $stmt->bindParam(':codrubro', $codrubro);
    $stmt->bindParam(':rubro', $rubro);

    if ($stmt->execute()) {
        echo "El producto se ha insertado correctamente.";
    } else {
        echo "Ha ocurrido un error al insertar el producto.";
    }
}
}

?>