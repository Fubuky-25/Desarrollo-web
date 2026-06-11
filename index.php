<?php

// iniciar o reanudar la sesion del usuario actual 
//session_start();
//var_dump($_SERVER);
//ECHO '</PRES>';

if (isset($_SESSION['user_id'])) {
    // el usuario esta logueado
    header('Location: backoffice/');
    exit; // siempre que haya un redireccionamiento 
} else {
    // el usuario no esta logueado
    header('Location: user/login/');
    exit; // siempre que haya un redireccionamiento 
}