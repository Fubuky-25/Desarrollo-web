<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    // el usuario no esta logueado
    header('Location: ../');
    exit; // siempre que haya un redireccionamiento 
}