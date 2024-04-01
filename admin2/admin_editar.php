<?php

include("conexion.php");

if (!isset($_POST["id"], $_POST["nombre"], $_POST["carnet"], $_POST["email"], $_POST["contrasena"], $_POST["id_rol"], $_POST["estado"])) {
    // Manejo de errores si los campos no están definidos
    exit("Error: No se recibieron todos los datos necesarios.");
}

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$carnet = $_POST['carnet'];
$correo = $_POST['email'];
$contrasena = $_POST['contrasena'];
$roles = $_POST['id_rol'];
$estado = $_POST['estado'];

// Verificar si el carnet o correo ya existe para otro usuario
$verif = "SELECT carnet, correo FROM user WHERE (carnet = '$carnet' OR correo = '$correo') AND id != '$id'";
$resultado = mysqli_query($conexion, $verif);

if (mysqli_num_rows($resultado) > 0) {
    // Si el carnet o correo ya existe para otro usuario, redirige al formulario de actualización
    header('Location: admin_actualizar.php?id=' . $id);
    exit;
} else {
    $sql = "UPDATE user SET nombre='$nombre', carnet='$carnet', correo='$correo', contrasena='$contrasena', id_rol='$roles', estado='$estado' WHERE id='$id'";
    $query = mysqli_query($conexion, $sql);
    if ($query) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Error al actualizar el usuario.";
    }
}
?>
