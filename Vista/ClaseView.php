<?php
class View {
    public function Render($stmt) {
        echo "<table>";
        echo "<tr><th>Codigo</th><th>Rubro</th></tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>" . $row['CodRubro'] . "</td><td>" . $row['Rubro'] . "</td>";
        }
        echo "</table>";
        require_once('Layout/Footer.php');
    }

    public function RenderRegistro()
    {
        require_once('Registro.php');
        require_once('Layout/Footer.php');


    }
}