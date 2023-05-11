<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Confirmar compra</title>
 
    <?php
    include 'Vista/Header.php';
    ?>
       </head>
    <body style="background-image: url('<?php echo PATH;?>/Vista/Cupones/img/yyy.jpg');">
        <div class="container">
            <?php
        
            $random_num=rand(100,999);
            $id_cupon=$viewBag[0];
            $empresa=$viewBag[1];
            $dui=$viewBag[2];
            $stock=$viewBag[3];
            $codigo_generado=$dui[0].$dui[1].$id_cupon[0].$empresa[0].$empresa[1].$empresa[2].$dui[2].$dui[3].$dui[4].$dui[5].$empresa[5].$dui[6].$dui[7].$dui[8].$id_cupon[1].$random_num;
            $_SESSION['codigo']=$viewBag;
  
            ?>
                    <div class="card mb-5" style="width: 50rem;">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <form action="<?=PATH?>/Cupones/Comprar/<?=$codigo_generado?>.<?=$viewBag[3]?>.<?=$id_cupon?>.<?=$stock?>" method="POST">
                                <h4 class="text-center py-3">Tu Pedido</h4>
                                <hr>
                                <p>Descripcion: <?=$_SESSION[$id_cupon."informacion"]['descripcion']?></p>
                                <p>Costo a pagar: $<?=$_SESSION[$id_cupon."informacion"]['precio']?></p>
                                <hr>
                                <div class="row">
                                <h4 class="text-center py-3">Datos de Compra</h4>
                                <div class="col-md-6">
                                <input type="numbers" name="n_tarjeta" id="n-tarjeta" class="form-control mb-3" placeholder="N° de Tarjeta" 
                                style="width:22rem;" required>
                                </div>
                                <div class="col-md-3">
                                <input type="text" name="fecha" id="fecha" class="form-control mb-3" placeholder="Fecha de expiracion" 
                                style="width:22rem;" required> 
                                <div class="col-md-3">
                                <input type="text" name="cvv" id="cvv" class="form-control mb-3" placeholder="CVV" 
                                style="width:22rem;" required> 
                                </div>
                                </div>
                                </div>
                                <div class="input-group mb-4"  style="width:47rem;">
                                <input type="text" class="form-control" disabled placeholder="<?=$codigo_generado?>" name="cod_generado">
                                <li class="btn btn-danger">Generar código de cupón</li>
                                <input type="hidden" name="m" value="">    
                                </div>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                <button type="submit" name="enviarVer" class="btn btn-warning mb-3" 
                                style="border-radius:20px; width:22rem;">Comprar cupon</button>
                                <input type="hidden" name="m" value="">
                                </div>
                                <p class="mb-3 text-center py-1 text-secondary">Después de realizar tu pago <br> se te enviará un correo para que <br> verifiques tu compra.</p>
                            </form>
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