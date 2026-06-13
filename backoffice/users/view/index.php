<?php

require_once '../../mvc/v1/conexion.php';
require_once '../../mvc/v1/models/usuario.php';

if (!isset($_GET['id'])) {
    header('Location: ../');
    exit;
}

$id = intval($_GET['id']);

$model = new Usuario();

$usuario = $model->getById($id);

if (!$usuario) {
    header('Location: ../');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Detalle Usuario</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body>

<div class="container mt-4">

    <div class="card">

        <div class="card-header">
            <h3>Detalle Usuario</h3>
        </div>

        <div class="card-body">

            <div class="row mb-3">

                <div class="col-md-6">
                    <strong>ID:</strong><br>
                    <?php echo $usuario['id']; ?>
                </div>

                <div class="col-md-6">
                    <strong>Rol:</strong><br>

                    <?php
                    switch ($usuario['rol']) {
                        case 1:
                            echo 'Administrador';
                            break;
                        case 2:
                            echo 'Vendedor';
                            break;
                        default:
                            echo 'Usuario';
                    }
                    ?>
                </div>

            </div>

            <div class="row mb-3">

                <div class="col-md-6">
                    <strong>Nombres:</strong><br>
                    <?php echo $usuario['nombres']; ?>
                </div>

                <div class="col-md-6">
                    <strong>Apellidos:</strong><br>
                    <?php echo $usuario['apellidos']; ?>
                </div>

            </div>

            <div class="row mb-3">

                <div class="col-md-6">
                    <strong>Correo:</strong><br>
                    <?php echo $usuario['correo']; ?>
                </div>

                <div class="col-md-6">
                    <strong>Teléfono:</strong><br>
                    <?php echo $usuario['telefono']; ?>
                </div>

            </div>

            <div class="row mb-3">

                <div class="col-md-6">
                    <strong>Fecha creación:</strong><br>
                    <?php echo $usuario['fecha_creacion']; ?>
                </div>

                <div class="col-md-6">
                    <strong>Estado:</strong><br>

                    <?php if ($usuario['activo']) { ?>

                        <span class="badge bg-success">
                            Activo
                        </span>

                    <?php } else { ?>

                        <span class="badge bg-danger">
                            Inactivo
                        </span>

                    <?php } ?>

                </div>

            </div>

        </div>

        <div class="card-footer">

            <a
                href="../"
                class="btn btn-secondary">

                Volver
            </a>

        </div>

    </div>

</div>

</body>
</html>