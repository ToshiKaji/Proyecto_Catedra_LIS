<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Mis cupones</title>
    </head>
    <body style="background-image: url('<?php echo PATH;?>/Vista/Cupones/img/yyy.jpg');">
        <div class="container">
            <header>
           <?php
include 'Vista/Header.php';
           ?>
            <!--Modal-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Mi Carrito</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <h4>Resumen: </h4>
                        <hr>
                        <a type="button" class="btn btn-danger" href="#">Vaciar carrito</a>
                        <a type="button" class="btn btn-success" href="../Cupones/Compra.php">Continuar pedido</a>
                        </div>
                    </div>
                </div>
            </div>
            </header>
            <div class="row">
                <div class="col-md d-flex flex-column justify-content-center align-items-center"> 
                    <br><br><br><br><br>
                    <div class="card mb-5" style="width: 28rem;">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <?php
                                if(empty($viewBag))
                                {?>
                                <h3 class="text-center text-primary">Aun no se compra ningun cupon</h3>
                                    
                                <?php
                                  }
                                  else
                                  {
                                ?>
                            <li class="nav-item">
                                <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Mis cupones comprados</button>
                            <table>
                               <tr>
                                 <th>Codigo de canjeo</th>
                                 <th>Estado de Canjeo</th>
                               </tr>
                               <tr>
                                <?php
                                foreach($viewBag as $cupon)
                                {
                                $estado_canjeo=($cupon['canjeo']==0)? "Sin canjear":"Canjeado";                                  
                                 ?>
                                 <td><?=$cupon['codigo_canjeo']?></td>
                                 <td><?=$estado_canjeo?></td>
                               </tr>
                               <?php
                                 }
                                  }
                               ?>
                             </table>
                            </li>

                            </ul>
                            <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <?php
                include 'Vista/Footer.php';
            ?>
        </footer>
    </body>
</html>