<?php

session_start();

$_SESSION = array(); // limpiar todas las variables de sesión
session_destroy(); // destruir la sesión

if(count($_SESSION) === 0) {
    header('Location: ../../'); // va a la raiz del proyecto
    exit; // siempre que haya un redireccionamiento 
} else {
    echo 'Error al cerrar sesión';
}