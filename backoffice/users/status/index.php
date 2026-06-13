<?php

session_start();

require_once '../../mvc/v1/conexion.php';
require_once '../../mvc/v1/models/usuario.php';

if (
    !isset($_GET['id']) ||
    !isset($_GET['estado'])
) {
    header('Location: ../');
    exit;
}

$id = intval($_GET['id']);
$estado = intval($_GET['estado']);

$usuario = new Usuario();

$usuario->changeStatus(
    $id,
    $estado
);

header('Location: ../');
exit;