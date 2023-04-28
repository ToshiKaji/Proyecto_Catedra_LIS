<?php

require_once 'Controller.php';
require_once('./Modelo/ModelClientes.php');
require './Controlador/email/src/PHPMailer.php';
require './Controlador/email/src/SMTP.php';
require './Controlador/email/src/Exception.php';


//Para envío de mail y verificar cuenta
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ControllerClientes extends Controller
{
    private $model;
     //Registra
     public function Ingresar_cliente()
     { $this->model = new ModelClientes();
         $this->model->getConnection();

             
                 
                 $mail = new PHPMailer(true);
                $viewBag=array();
                 
                 $cliente_nuevo=array();
 
                 $user=2;
                 $telefono=$_POST['telefono'];
                 $cliente_nuevo['telefono']=$telefono;
                 $correo=$_POST['correo'];
                 $cliente_nuevo['correo']=$correo;
                 $contrasena=hash('sha256',$_POST['contrasena']);
                 $nombre=$_POST['nombre'];
                 $cliente_nuevo['nombre']=$nombre;
                 $direccion=$_POST['direccion'];
                 $cliente_nuevo['direccion']=$direccion;
                 $apellido=$_POST['apellido'];
                 $cliente_nuevo['apellido']=$apellido;
                 $dui=$_POST['dui'];
                 $cliente_nuevo['dui']=$dui;
                 $hashver = md5(rand(0,1000));
                 $activado=0;
                 $errores=array();

                 if(vacio($telefono)||!isset($telefono))
                 {
                    array_push($errores,'Tienes que ingresar un numero telefonico');
                 }
                 elseif(!Telefono($telefono))
                 {
                    array_push($errores,'El numero telefonico no tiene el formato correcto');
                 }
                 if(vacio($correo)||!isset($correo))
                 {
                    array_push($errores,'Tienes que ingresar un correo');
                 }
                 elseif(!Correo($correo))
                 {
                    array_push($errores,'El correo electronico no tiene el formato correcto');
                 }
                 if(vacio($nombre)||!isset($nombre))
                 {
                    array_push($errores,'Tienes que ingresar un nombre');
                 }
                 elseif(!Texto($nombre))
                 {
                    array_push($errores,'El nombre solo debe incluir letras');
                 }
                 if(vacio($apellido)||!isset($apellido))
                 {
                    array_push($errores,'Tienes que ingresar un apellido');
                 }
                 elseif(!Texto($apellido))
                 {
                    array_push($errores,'El apellido solo debe incluir letras');
                 }
                 if(vacio($dui)||!isset($dui))
                 {
                    array_push($errores,'Tienes que ingresar un numero de DUI');
                 }
                 elseif(!Dui($dui))
                 {
                    array_push($errores,'No debes incluir guiones en el DUI');
                 }
                 if(count($errores)==0)
                 {
                 
                 $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                 $mail->isSMTP();
                 $mail->Host = 'smtp.gmail.com';
                 $mail->SMTPAuth = true;
                 $mail->Username = 'ventas.envio2023@gmail.com';
                 $mail->Password = 'lqkqzogqvlitwwbi';
                 $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                 $mail->Port = 587;
 
                 $mail->setFrom('ventas.envio2023@gmail.com', 'La Cuponera');
                 //se debe cambiar correo para cada cliente
                 $mail->addAddress($correo);
                 $linkV = "http://localhost:8080/Proyecto_Catedra_LIS/Vista/Usuarios/Activacion.php?email=".$correo;
 
                 $mail->isHTML(true);
                 $mail->CharSet = 'UTF-8';
                 $mail->Subject = 'Verifica tu cuenta';
                 $mail->Body = "Buen día, ".$nombre.".
                 <br/>Para disfrutar de los cupones de descuento de La Cuponera primero debes verificar tu cuenta,
                 si estás de acuerdo, presiona el link de verificar que se muestra abajo. <br>
 
                 Tu código de verificación es: <b>".$hashver."</b>.<br>
                 Debes ingresarlo en el siguiente link: ".$linkV."
 
                 <br><br>Los servicios de <b>La Cuponera</b> están disponibles las 24 horas del día,
                 escoge los mejores descuento en <b>La Cuponera</b>.";
 
             if($this->model->Validar_Repeticiones($correo,$dui,$user))
             {
                 echo "<script> alert('Ya existe una cuenta registrada con estas credenciales.')
                 document.location.href='../Usuarios/newLogin.php';
                 </script>";
             }
             else
             {
               
                 $mail->send();
 
                 $this->model->Ingresar_clientes($direccion,$user,$correo,$telefono,$contrasena,$nombre,$apellido,$dui,$hashver,$activado);
 
                 echo "<script> alert('Correo enviado, revisa tu correo.')
                 document.location.href='".PATH."/Clientes/Activacion';
                 </script>";
             
              
 
             }
                 
            }
            else
            {
                $viewBag['errores']=$errores;
                $viewBag['cliente_nuevo']=$cliente_nuevo;
            $this->render('newLogin.php',$viewBag);
            }
        
         
     }

     public function Validar_cliente()
     {
        $this->model = new ModelClientes();
         $this->model->getConnection();
         $errores=array();
        
        
         $correo_login=$_REQUEST['correo_login'];

         if(vacio($correo_login)||!isset($correo_login))
         {
            array_push($errores,'Tienes que ingresar un correo');
         }
         elseif(!Correo($correo_login))
         {
            array_push($errores,'El correo electronico no tiene el formato correcto');
         }
         if(count($errores)==0)
         { session_start();
         $pwcli_login=hash('sha256', $_REQUEST['contrasena_login']);
         if($this->model->Validar_Active($correo_login))
         {
             if($this->model->Validar_clientes($correo_login,$pwcli_login))
             {
                 $cliente = $this->model->Validar_clientes($correo_login,$pwcli_login);
                 $_SESSION['cliente'] = $cliente;
              
                 header("location:".PATH);
             }
             else{
                 echo "<script>alert('El correo y/o la contraseña no son válidos.');
                 window.location.href='".PATH."/Clientes/Ingresar';</script>";
 
             }
         }
         else
         {
             echo "<script>alert('Tu cuenta no está activa, verifícala para iniciar sesión.');
             window.location.href='../Clientes/Activacion';</script>";
         }
        }
        else
        {
            $this->render('Login.php',$errores);
        }
     }

     public function CerrarSesion()
     {
         session_start();
         session_unset();
         session_destroy();
         header("location:".PATH);
     }

     public function Recuperacion()
     {
        $this->render('recuperacionCorreo.php');
     }
     public function Recuperacion_Cuenta()
     {
         $this->model->getConnection();
         $correo = $_REQUEST['correo'];
 
         //validamos si la cuenta a recuperar está activa y existe
         if($this->model->Validar_Active($correo))
         {
             $nuevaPsd = md5(rand(0,1000));
 
             try
             {
                 $mail = new PHPMailer(true);
                 $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                 $mail->isSMTP();
                 $mail->Host = 'smtp.gmail.com';
                 $mail->SMTPAuth = true;
                 $mail->Username = 'ventas.envio2023@gmail.com';
                 $mail->Password = 'lqkqzogqvlitwwbi';
                 $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                 $mail->Port = 587;
 
                 $mail->setFrom('ventas.envio2023@gmail.com', 'La Cuponera');
 
                 $mail->addAddress($correo);
 
                 $mail->isHTML(true);
                 $mail->CharSet = 'UTF-8';
                 $mail->Subject = 'Cambio de Contraseña';
                 $mail->Body = "Buen día.
                 <br/>Parece que perdiste tu cuenta, tu solicitud de cambio de contraseña está lista.<br>
 
                 Tu nueva contraseña es: <b>".$nuevaPsd."</b>.<br>
                 Ahora podrás ingresar en tu cuenta sin ningún problema.
 
                 <br><br>Los servicios de <b>La Cuponera</b> están disponibles las 24 horas del día,
                 escoge los mejores descuento en <b>La Cuponera</b>.";
                 
                 $mail->send();
 
                 //nueva contraseña encriptada
                 $nuevaPsd = hash('sha256', $nuevaPsd);
 
                 $this->model->Nueva_Psd($correo, $nuevaPsd);
 
                 echo "<script> alert('La nueva contraseña ha sido generada, revisa tu correo.')
                 document.location.href='../Usuarios/login.php';
                 </script>";
             }
             catch(Exception $e)
             {
                 echo 'Mensaje: ' . $mail->ErrorInfo;
             }
         }
         else
         {
             echo "<script>alert('El correo que ingresaste no existe o no está activo.');
             window.location.href='../Usuarios/recuperacionCorreo.php';</script>";
         }
     }

     public function Registrar()
    { 
        $this->render('newLogin.php',[]);
    

    }

    public function Ingresar()
    { 
        $this->render('login.php',[]);
    

    }

    public function Activacion()
    { 
        $this->render('Activacion.php',[]);
    

    }

    public function Activar_cuenta()
    { $this->model = new ModelClientes();
        $this->model->getConnection();
        $hashver = $_POST['cod_verificacion'];
        $this->model->Activando($hashver);
        header('location:'.PATH.'/Clientes/Ingresar');
        
    

    }
}