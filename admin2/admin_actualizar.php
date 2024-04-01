<?php

// Incluir archivo de conexión
include ("conexion.php");

if (!isset ($_GET['id']) || empty ($_GET['id'])) {
    echo "ID de usuario no proporcionado.";
    exit;
}

// Obtener el ID del usuario de la URL
$id_usuario = $_GET['id'];


// Realizar consulta SQL para obtener los datos del usuario
$sql = "SELECT * FROM user WHERE id='$id_usuario'";
$query = mysqli_query($conexion, $sql);

// Verificar si se encontraron resultados
if (!$query || mysqli_num_rows($query) === 0) {
    echo "No se encontró el usuario.";
    exit;
}

// Obtener los datos del usuario
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo_editar.css">
    <title>Editar usuarios</title>
</head>

<body background="iconos/fondo8.jpg">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Editar Usuario</h1>
                        <form action="admin_editar.php" method="POST">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre"
                                    value="<?= $row['nombre'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="carnet" class="form-label">Carnet:</label>
                                <input type="text" class="form-control" name="carnet" placeholder="Carnet"
                                    value="<?= $row['carnet'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo:</label>
                                <input type="text" class="form-control" name="email" placeholder="Email"
                                    value="<?= $row['correo'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="contrasena" class="form-label">Contraseña:</label>
                                <input type="text" class="form-control" name="contrasena" placeholder="Contraseña"
                                    value="<?= $row['contrasena'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="estado" class="form-label">Estado:</label>
                                <input type="text" class="form-control" name="estado" placeholder="Estado"
                                    value="<?= $row['estado'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="id_rol" class="form-label">Rol:</label>
                                <select class="form-select" name="id_rol">
                                    <option value="1" <?= ($row['id_rol'] == 1) ? 'selected' : '' ?>>Rol 1
                                        Administrador</option>
                                    <option value="2" <?= ($row['id_rol'] == 2) ? 'selected' : '' ?>>Rol 2
                                        Lector</option>
                                </select>
                            </div>
                            <div class="d-grid gap-2">
                                <input type="submit" class="btn btn-primary" value="Actualizar">
                                <a href="admin.php" class="btn btn-secondary">Salir</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
