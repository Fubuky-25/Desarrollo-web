<?php

session_start();
$_SESSION['errores'] = ['mantenedor' => 'usuarios', 'items' => []];

if ($_POST['email'] == "") {
    $_SESSION['errores']['items']['email'] = 'El campo email es obligatorio';
}
if ($_POST['name'] == "") {
    $_SESSION['errores']['items']['name'] = 'El campo nombre es obligatorio';
}
if ($_POST['lastname'] == "") {
    $_SESSION['errores']['items']['lastname'] = 'El campo apellido es obligatorio';
}
if ($_POST['password'] == "") {
    $_SESSION['errores']['items']['password'] = 'El campo contraseña es obligatorio';
}
if ($_POST['password_confirm'] == "") {
    $_SESSION['errores']['items']['password_confirm'] = 'El campo confirmar contraseña es obligatorio';
}

if (!empty($_SESSION['errores']['items'])) {
    header('Location: ../');
    exit;
}