<?php



session_start();

if (isset($_SESSION['user_id'])) {
    // el usuario ya esta logueado
    header('Location: ../../../dashboard/');
    exit; // siempre que haya un redireccionamiento 
} 
    // el usuario no esta logueado
    $formUsername = $_POST['username'];
    $formPassword = $_POST['password'];
    $user ='proyecto@web.cl';
    $pass= 'holamundo';
    if ($user === $formUsername && $pass === $formPassword) {
        // credenciales correctas
        $_SESSION['user_id'] = 1; // asignar un ID de usuario a la sesión
        $_SESSION['username'] = 'proyecto'; // opcional: almacenar el nombre de usuario en la sesión
        header('Location: ../../../dashboard/');
        exit; // siempre que haya un redireccionamiento 
    } else {
        // credenciales incorrectas
        echo 'Credenciales incorrectas';
    }
    exit; // siempre que haya un redireccionamiento 
