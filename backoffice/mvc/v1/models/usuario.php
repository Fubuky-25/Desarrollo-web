<?php

/*
CREATE TABLE usuario (
    id INT PRIMARY KEY AUTO_INCREMENT,

    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,

    correo VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,

    rol INT NOT NULL,

    telefono VARCHAR(20),

    fecha_creacion TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

    fecha_actualizacion TIMESTAMP NULL DEFAULT NULL
        ON UPDATE CURRENT_TIMESTAMP,

    activo BOOLEAN NOT NULL DEFAULT TRUE
);

Insert INTO usuario (nombres, apellidos, correo, password, rol, telefono) VALUES
('Admin', 'Admin', 'admin@example.com', MD5('admin123'), 1, '1234567890');

CREATE TABLE usuario_codigo (
    id INT PRIMARY KEY AUTO_INCREMENT,

    usuarioID INT NOT NULL,

    codigo VARCHAR(6) NOT NULL,

    fecha_creacion TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

    activo BOOLEAN NOT NULL DEFAULT TRUE,

    FOREIGN KEY (usuarioID)
        REFERENCES usuario(id)
);
*/

class Usuario
{
    private $id;
    private $nombres;
    private $apellidos;
    private $correo;
    private $password;
    private $rol;
    private $telefono;
    private $fecha_creacion;
    private $fecha_actualizacion;
    private $activo;

    public function __construct()
    {
    }

    // GETTERS

    public function getId()
    {
        return $this->id;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

    public function getFechaActualizacion()
    {
        return $this->fecha_actualizacion;
    }

    public function isActivo()
    {
        return $this->activo;
    }

    // SETTERS

    public function setId($_n)
    {
        $this->id = $_n;
    }

    public function setNombres($_n)
    {
        $this->nombres = $_n;
    }

    public function setApellidos($_n)
    {
        $this->apellidos = $_n;
    }

    public function setCorreo($_n)
    {
        $this->correo = $_n;
    }

    public function setPassword($_n)
    {
        $this->password = md5($_n);
    }

    public function setRol($_n)
    {
        $this->rol = $_n;
    }

    public function setTelefono($_n)
    {
        $this->telefono = $_n;
    }

    public function setFechaCreacion($_n)
    {
        $this->fecha_creacion = $_n;
    }

    public function setFechaActualizacion($_n)
    {
        $this->fecha_actualizacion = $_n;
    }

    public function setActivo($_n)
    {
        $this->activo = $_n;
    }

    // MÉTODOS

    public function getAll()
{
    $lista = [];

    $con = new Conexion();

    $query = "
        SELECT
            id,
            nombres,
            apellidos,
            correo,
            password,
            rol,
            telefono,
            fecha_creacion,
            fecha_actualizacion,
            activo
        FROM usuario
        ORDER BY id DESC
    ";

    $rs = mysqli_query(
        $con->getConnection(),
        $query
    );

    if (!$rs) {
    die(mysqli_error($con->getConnection()));
    }

    if ($rs) {

        while ($registro = mysqli_fetch_assoc($rs)) {

            // Convertimos el valor de BD a booleano
            $registro['activo'] =
                $registro['activo'] == 1
                ? true
                : false;

            $objeto = [

                "id" => $registro['id'],

                "nombres" => $registro['nombres'],

                "apellidos" => $registro['apellidos'],

                "correo" => $registro['correo'],

                "password" => $registro['password'],

                "rol" => $registro['rol'],

                "telefono" => $registro['telefono'],

                "fecha_creacion" => $registro['fecha_creacion'],

                "fecha_actualizacion" => $registro['fecha_actualizacion'],

                "activo" => $registro['activo']

            ];

            array_push($lista, $objeto);
        }

        mysqli_free_result($rs);
    }

    $con->closeConnection();

    return $lista;
}

/**
 * Guarda un nuevo usuario en la base de datos
 */
public function save()
{
    $con = new Conexion();

    $query = "
        INSERT INTO usuario
        (
            nombres,
            apellidos,
            correo,
            password,
            rol,
            telefono,
            activo
        )
        VALUES
        (
            '{$this->nombres}',
            '{$this->apellidos}',
            '{$this->correo}',
            '{$this->password}',
            {$this->rol},
            '{$this->telefono}',
            1
        )
    ";

    $rs = mysqli_query(
        $con->getConnection(),
        $query
    );

    $con->closeConnection();

    return $rs;
}

/**
 * Cambia el estado de un usuario
 */
public function changeStatus($id, $estado)
{
    $con = new Conexion();

    $query = "
        UPDATE usuario
        SET activo = {$estado}
        WHERE id = {$id}
    ";

    $rs = mysqli_query(
        $con->getConnection(),
        $query
    );

    $con->closeConnection();

    return $rs;
}

public function getById($id)
{
    $con = new Conexion();

    $query = "
        SELECT
            id,
            nombres,
            apellidos,
            correo,
            password,
            rol,
            telefono,
            fecha_creacion,
            fecha_actualizacion,
            activo
        FROM usuario
        WHERE id = {$id}
        LIMIT 1
    ";

    $rs = mysqli_query(
        $con->getConnection(),
        $query
    );

    $usuario = null;

    if ($rs) {

        if ($registro = mysqli_fetch_assoc($rs)) {

            $usuario = $registro;
        }

        mysqli_free_result($rs);
    }

    $con->closeConnection();

    return $usuario;
}

}