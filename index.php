<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php
require_once("Database/Database.php");
require_once("Controlador/Controller.php");
require_once("Vista/View.php");

$model = new Database();
$view = new View();
$model->getConnection();
$controller = new Controller($model, $view);
$controller->index();

?>

</body>
</html>