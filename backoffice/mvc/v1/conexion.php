<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    // el usuario no esta logueado
    header('Location: ../../');
    exit; // siempre que haya un redireccionamiento 
}

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
        $this->host = '127.0.0.1';
        $this->port = 3306;
        $this->bd = 'funeraria_mantenedor';
        $this->username = 'funeraria_app';
        $this->password = 'Funeraria2026!';
    }


    public function getConnection(){
        try {
            $this->connection = mysqli_connect($this ->host, $this->username, $this->password, $this->bd, $this->port);
            mysqli_set_charset($this->connection, "utf8");
            if (!$this->connection) {
                throw new Exception(":(Error al conectar a la base de datos: " . mysqli_connect_error());
            }
            return $this->connection;
        }catch (Exception $ex) {
            error_log($ex->getMessage());
            die (":(Se levanto la exception en la conexion a la base de datos: " . $ex->getMessage());
        }
    }

    public function closeConnection(){
        if ($this->connection) {
            mysqli_close($this->connection);
            return 1;
        }
        return 0;
    }
}


