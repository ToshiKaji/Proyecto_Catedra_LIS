<?php
define("urlsite","http://localhost/ToshiLIS/Proyecto%20de%20Catedra/");
const PATH='/ToshiLIS/Proyecto_Catedra_LIS';
function my_session_start() {
    if (session_status() === PHP_SESSION_ACTIVE) {
        return true;
    }
    return session_start();
}
