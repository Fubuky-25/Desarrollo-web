<?php

class Conexion{

    private $connection;
    private $host;
    private $username;
    private $password;
    private $bd;
    private $port;
    private $server;

    public function __construct(){
        $this ->connection = null;
        $this ->server = $_SERVER['SERVER_NAME'];
        $this ->host = '127.0.0.1';
        $this ->port = '3306';
        $this ->bd = 'base_de_datos';
    }
}
$conexion = new Conexion();
echo '<pre>';
print_r($_SERVER);
echo '</pre>';
