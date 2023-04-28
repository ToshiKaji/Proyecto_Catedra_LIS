<?php
function Texto($campo)
{
    return preg_match('/^[a-zA-Z ]+$/',$campo);
}

function Vacio($campo)
{
    return empty(trim($campo));
}

   function Correo($campo)
{
    return filter_var($campo,FILTER_VALIDATE_EMAIL);
} 
function Telefono($campo)
{
    return preg_match('/^[267][0-9]{3}-?[0-9]{4}$/',$campo);
}

function Dui($campo)
{
    return preg_match('/^[0-9]{9}$/',$campo);
}

function Tarjeta($numero, $fecha, $codigo)
{
    $errores=0;
    if(preg_match('/^4[0-9]{15}$|^5[1-5][0-9]{14}$|^6(?:011|5[0-9]{2})[0-9]{12}$|3[47][0-9]{13}$/',$numero)&& !empty($numero))
    {
        if(preg_match('/^(0[1-9]|1[0-2])\/([0-9]{2})$/',$fecha) && !empty($fecha))
        {
            if(preg_match('/^[0-9]{3,4}$/',$codigo) && !empty($codigo))
            {
                return true;
            }
        }
    }
    else
    {
        return false;
    }


}



?>