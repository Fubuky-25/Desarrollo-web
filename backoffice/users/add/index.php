<?php

session_start();

$_SESSION['errores'] = [
    'mantenedor' => 'usuarios',
    'items' => []
];

if ($_POST['email'] == "") {
    $_SESSION['errores']['items']['email'] =
        'El campo email es obligatorio';
}

if ($_POST['name'] == "") {
    $_SESSION['errores']['items']['name'] =
        'El campo nombre es obligatorio';
}

if ($_POST['lastname'] == "") {
    $_SESSION['errores']['items']['lastname'] =
        'El campo apellido es obligatorio';
}

if ($_POST['telefono'] == "") {
    $_SESSION['errores']['items']['telefono'] =
        'El campo teléfono es obligatorio';
}

if ($_POST['password'] == "") {
    $_SESSION['errores']['items']['password'] =
        'El campo contraseña es obligatorio';
}

if ($_POST['password_confirm'] == "") {
    $_SESSION['errores']['items']['password_confirm'] =
        'El campo confirmar contraseña es obligatorio';
}


if (!isset($_POST['rol']) || trim($_POST['rol']) == ""
) {
    $_SESSION['errores']['items']['rol'] =
        'Debe seleccionar un rol';
}

if (
    $_POST['password']
    !=
    $_POST['password_confirm']
) {
    $_SESSION['errores']['items']['password_confirm'] =
        'Las contraseñas no coinciden';
}

if (!empty($_SESSION['errores']['items'])) {

    header('Location: ../');

    exit;
}

require_once '../../mvc/v1/conexion.php';
require_once '../../mvc/v1/models/usuario.php';

$usuario = new Usuario();

$usuario->setNombres(
    trim($_POST['name'])
);

$usuario->setApellidos(
    trim($_POST['lastname'])
);

$usuario->setCorreo(
    trim($_POST['email'])
);

$usuario->setTelefono(
    trim($_POST['telefono'])
);

$usuario->setPassword(
    trim($_POST['password'])
);

$usuario->setRol(
    intval($_POST['rol'])
);


$resultado = $usuario->save();

if ($resultado) {

    $_SESSION['mensaje'] =
        'Usuario creado correctamente';

} else {

    $_SESSION['errores']['items']['general'] =
        'No fue posible crear el usuario';
}

header('Location: ../');
exit;