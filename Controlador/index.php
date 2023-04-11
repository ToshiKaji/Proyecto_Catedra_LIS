<?php
require_once('./Modelo/index.php');
require_once('./Vista/ClaseView.php');
require './Controlador/email/src/PHPMailer.php';
require './Controlador/email/src/SMTP.php';
require './Controlador/email/src/Exception.php';

//Para envío de mail y verificar cuenta
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Controller {

    private $model;
    private $view;
    
    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    //muestra pagina inicio en el primer index
    function Index()
    {
        $this->model->getConnection();
        header("location:./Vista/Cupones/Inicio.php");
    }

    //Registra
    public function Ingresar_cliente()
    { 
        $this->model->getConnection();

            try
            {
                
                $mail = new PHPMailer(true);

                $usercli=$_REQUEST['user'];
                $correo=$_REQUEST['correo'];
                $pwcli=hash('sha256', $_REQUEST['contrasena']);
                $nombre=$_REQUEST['nombre'];
                $apellido=$_REQUEST['apellido'];
                $dui=$_REQUEST['dui'];
                $hashCode = md5(rand(0,1000));

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

                Tu código de verificación es: <b>".$hashCode."</b>.<br>
                Debes ingresarlo en el siguiente link: ".$linkV."

                <br><br>Los servicios de <b>La Cuponera</b> están disponibles las 24 horas del día,
                escoge los mejores descuento en <b>La Cuponera</b>.";

            if($this->model->Validar_Repeticiones($correo,$dui,$usercli))
            {
                echo "<script> alert('Ya existe una cuenta registrada con estas credenciales.')
                document.location.href='../Usuarios/newLogin.php';
                </script>";
            }
            else
            {
                $mail->send();

                $this->model->Ingresar_clientes($usercli,$correo,$pwcli,$nombre,$apellido,$dui,$hashCode,0);

                echo "<script> alert('Correo enviado, revisa tu correo.')
                document.location.href='../Cupones/Inicio.php';
                </script>";

            }
                
        }
        catch(Exception $e)
        {
            echo 'Mensaje: ' . $mail->ErrorInfo;
        }
        
    }

    public function ActivarCuenta()
    {
        $this->model->getConnection();

        $cod=$_REQUEST['cod'];
        if($this->model->ActivacionValues($cod))
        {
            $this->model->Activando($cod);
            echo "<script> alert('Cuenta activada éxitosamente.')
            document.location.href='../Usuarios/login.php';
            </script>";
        }
        else{
            header("location:../Usuarios/newLogin.php");
        }
    }

    public function Validar_cliente()
    {
        $this->model->getConnection();
        $correo = $_REQUEST['correo'];
        $pwcli = hash('sha256', $_REQUEST['contrasena']);

        if($this->model->Validar_Active($correo))
        {
            if($this->model->Validar_clientes($correo,$pwcli))
            {
                $cliente = $this->model->Validar_clientes($correo,$pwcli);
                $_SESSION['cliente'] = $cliente['Nombre'];
                header("location:../Cupones/CuponeraSession.php");
            }
            else{
                echo "<script>alert('El correo y/o la contraseña no son válidos.');
                window.location.href='../Usuarios/login.php';</script>"; 

            }
        }
        else
        {
            echo "<script>alert('Tu cuenta no está activa, verifícala para iniciar sesión.');
            window.location.href='../Usuarios/login.php';</script>";
        }
    }

    public function CerrarSesion()
    {
        session_unset();
        session_destroy();
        header("location:../Cupones/Inicio.php");
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

}




?>